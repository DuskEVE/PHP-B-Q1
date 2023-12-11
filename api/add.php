<?php
include_once "./db.php";

$DB = ${ucfirst($_POST['table'])};
$table = $_POST['table'];

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'], "../img/".$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
if($table == 'admin') unset($_POST['password2']);
else $_POST['display'] = ($table == 'title'? 0:1);

unset($_POST['table']);
$DB->update($_POST);

header("location:../admin.php?do={$table}");
?>