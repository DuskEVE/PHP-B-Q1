<?php
include_once "./db.php";
session_start();
$user = 0;

if(isset($_POST['user']) && isset($_POST['password'])){
    $user = $Admin->count(['user'=>$_POST['user'], 'password'=>$_POST['password']]);
}

if($user > 0){
    $_SESSION['user'] = $_POST['user'];
    header("location:../admin.php?do=title");
}
else header("location:../index.php?do=login&error=1");
?>