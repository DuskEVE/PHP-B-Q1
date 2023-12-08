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

$Title = new myDB('localhost', 'utf8', 'db15', 'root', '', 'title');
$Total = new myDB('localhost', 'utf8', 'db15', 'root', '', 'total');
$Bottom = new myDB('localhost', 'utf8', 'db15', 'root', '', 'bottom');