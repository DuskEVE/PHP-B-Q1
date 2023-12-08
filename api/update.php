<?php
    include_once "./db.php";
    $table = $_POST['table'];
    $DB = ${ucfirst($table)};
    $data = $DB->search(['id'=>$_POST['id']]);

    if(isset($_FILES['img']['tmp_name'])){
        move_uploaded_file($_FILES['img']['tmp_name'], "../img/".$_FILES['img']['name']);
        $data['img'] = $_FILES['img']['name'];
    }

    $DB->update($data);
    header("location:../admin.php?do={$table}");
?>