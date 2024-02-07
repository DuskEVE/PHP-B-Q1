<?php
class myDB{
    private $host = 'localhost';
    private $charset = 'utf8';
    private $dbname = 'web15_1';
    private $user = 'root';
    private $password = '';
    private $table;

    function __construct($table){
        $this->table = $table;
    }
    function dbLogIn(){
        $dns = "host={$this->host};charset={$this->charset};dbname={$this->dbname}";
        return new PDO($dns, $this->user, $this->password);
    }
    function getTargetSet($target, $sep){
        $targetSet = [];
        foreach($target as $key=>$value){
            $str = "`$key`='$value'";
            array_push($targetSet, $str);
        }

        return join($sep, $targetSet);
    }
    function search($target){
        $pdo = $this->dbLogIn();
        $targetSet = $this->getTargetSet($target, '&');
        $sql = "select * from `$this->table` where $targetSet";
        
        return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function searchAll($target=[], $option=""){
        $pdo = $this->dbLogIn();
        $sql = "select * from `$this->table`";
        $targetSet = "";
        if(count($target) > 0){
            $targetSet = $this->getTargetSet($target, '&');
            $sql = "$sql where $targetSet";
        }
        if(strlen($option) > 0) $sql = "$sql $option";
        
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function update($target){
        $pdo = $this->dbLogIn();
        $sql = "";
        if(isset($target['id'])){
            $id = $target['id'];
            unset($target['id']);
            $targetSet = $this->getTargetSet($target, ",");
            $sql = "update `$this->table` set $targetSet where `id`=$id";
        }
        else{
            $keys = array_keys($target);
            $values = array_values($target);
            $sql = "insert into `$this->table` (`".join("`,`", $keys)."`) values('".join("','", $values)."')";
        }

        return $pdo->exec($sql);
    }
    function delete($target){
        $pdo = $this->dbLogIn();
        $targetSet = $this->getTargetSet($target, "&");
        $sql = "delete from `$this->table` where $targetSet";

        return $pdo->exec($sql);
    }
    function count($target){
        $pdo = $this->dbLogIn();
        $targetSet = $this->getTargetSet($target, "&");
        $sql = "select count(*) from `$this->table` where $targetSet";

        return $pdo->query($sql)->fetch()[0];
    }
    function sql($sql){
        $pdo = $this->dbLogIn();
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>