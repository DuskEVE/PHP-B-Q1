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
        $Admin->update($admin);
    }
}
else{
    if($_POST['password'] == $_POST['passwordRe']){
        unset($_POST['passwordRe']);
        $Admin->update($_POST);
    }
    else{
        echo "<script>alert('密碼和確認密碼不符')</script>";
        header("location:../admin.php?do=admin");
    }
}

header("location:../admin.php?do=admin");
?>