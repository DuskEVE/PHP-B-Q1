<?php

class myDB{
    private $host;
    private $charSet;
    private $database;
    private $user;
    private $password;
    private $table;

    function __construct($host, $charSet, $database, $user, $password, $table){
        $this->host = $host;
        $this->charSet = $charSet;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
        $this->table = $table;
    }

    function changeUser($user, $password){
        $this->user = $user;
        $this->password = $password;
    }

    function changeDatabase($host, $charSet, $database){
        $this->host = $host;
        $this->charSet = $charSet;
        $this->database = $database;
    }

    function changeTable($table){
        $this->table = $table;
    }

    function dbLogin(){
        $dns = "mysql:host={$this->host}; charset={$this->charSet}; dbname={$this->database}";
        return new PDO($dns, $this->user, $this->password);
    }

    function sqlSet($target, $separator){
        $targetSet = [];
        foreach($target as $key=>$value){
            $str = "`{$key}`='{$value}'";
            array_push($targetSet, $str);
        }

        return implode($separator, $targetSet);
    }
    
    function search($target){
        $pdo = $this->dbLogin();
        $sql = "select * from `{$this->table}` where ".$this->sqlSet($target, '&&');

        return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function searchAll($target = []){
        $pdo = $this->dbLogin();
        $sql = "select * from `{$this->table}`";
        if(count($target) > 0) $sql = $sql." where ".$this->sqlSet($target, '&&');

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function update($target){
        $pdo = $this->dbLogin();
        $sql = '';
        if(isset($target['id'])){
            $id = $target['id'];
            unset($target['id']);
            $sql = "update `{$this->table}` set {$this->sqlSet($target, ',')} where `id`='{$id}'";
        }
        else{
            $sql = "insert into `{$this->table}` (`".implode("`,`", array_keys($target))."`)
                    values('".implode("','", array_values($target))."')";
        }
        
        return $pdo->exec($sql);
    }

    function delete($target){
        $pdo = $this->dbLogin();
        $sql = "delete from `{$this->table}` where `id`={$target['id']}";

        return $pdo->exec($sql);
    }
}

    $myDB = new myDB('localhost', 'utf8', 'school', 'root', '', 'students');
    
    printArray($myDB->search(['id'=>1]));
    echo printTable( $myDB->searchAll(['dept'=>'2', 'graduate_at'=>'2']) );
    
    $myDB->changeTable('dept');
    echo printTable( $myDB->searchAll() );
    echo $myDB->update(['id'=>20, 'code'=>115, 'name'=>'電子系']);
    echo printTable( $myDB->searchAll() );
    
    $myDB->changeDatabase('localhost', 'utf8', 'member');
    $myDB->changeTable('user');
    echo printTable( $myDB->searchAll() );
    
    echo "<br>";
    $myDB->changeDatabase('localhost', 'utf8', 'school');
    $myDB->changeTable('dept');
    // echo $myDB->update(['code'=>113, 'name'=>'織品系']);
    // echo $myDB->delete(['id'=>22]);
    

    function printArray($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

    function printTable($arr){
        $keys = array_keys($arr[0]);
        $result = [];

        array_push($result, '<tr><td>'.join('</td><td>', $keys).'</td></tr>');

        for($i=0; $i<count($arr); $i++){
            array_push($result, '<tr>');

            foreach($arr[$i] as $key=>$value){
                array_push($result, '<td>'.$value.'</td>');
            }

            array_push($result, '</tr>');
        }

        return '<table>'.join($result).'</table>';
    }