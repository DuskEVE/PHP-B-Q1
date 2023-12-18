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

    function searchAll($target = [], $opt=""){
        $pdo = $this->dbLogin();
        $sql = "select * from `{$this->table}`";
        if(count($target) > 0) $sql = $sql." where ".$this->sqlSet($target, '&&');
        if(strlen($opt) > 0) $sql = $sql." ".$opt;

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // function columNames(){
    //     $pdo = $this->dbLogin();
    //     $sql = "";
    //     return $pdo->query($sql);
    // }

    function count($target = []){
        $pdo = $this->dbLogin();
        $sql = "select count(*) from `{$this->table}`";
        if(count($target) > 0) $sql = $sql." where ".$this->sqlSet($target, '&&');

        $count = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $count['count(*)'];
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

    function sql($sql){
        $pdo = $this->dbLogin();
        return $pdo->exec($sql);
    }
}

$Title = new myDB('localhost', 'utf8', 'db15', 'root', '', 'title');
$Total = new myDB('localhost', 'utf8', 'db15', 'root', '', 'total');
$Bottom = new myDB('localhost', 'utf8', 'db15', 'root', '', 'bottom');
$Ad = new myDB('localhost', 'utf8', 'db15', 'root', '', 'ad');
$Mvim = new myDB('localhost', 'utf8', 'db15', 'root', '', 'mvim');
$Image = new myDB('localhost', 'utf8', 'db15', 'root', '', 'image');
$News = new myDB('localhost', 'utf8', 'db15', 'root', '', 'news');
$Admin = new myDB('localhost', 'utf8', 'db15', 'root', '', 'admin');
$Menu = new myDB('localhost', 'utf8', 'db15', 'root', '', 'menu');

if(!isset($_SESSION['visited'])){
    $Total->sql("update `total` set `total`=`total`+1 where `id`=1");
    $_SESSION['visited'] = 1;
}