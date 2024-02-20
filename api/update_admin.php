<?php
include_once "./db.php";
if(!isset($_SESSION['user'])) header("location:../index.php");
if(isset($_POST['id'])){
    foreach($_POST['id'] as $index=>$id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Admin->delete(['id'=>$id]);
            continue;
        }
        $admin['id'] = $id;
        $admin['user'] = $_POST['user'][$index];
        $admin['password'] = $_POST['password'][$index];
        $Admin->update($admin);
    }
    header("location:../admin.php?do=admin");
}
else{
    if($_POST['password'] == $_POST['passwordRe']){
        unset($_POST['passwordRe']);
        $Admin->update($_POST);
        echo 1;
    }
    else echo 0;
}

?>