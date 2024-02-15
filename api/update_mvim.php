<?php
include_once "./db.php";

if(isset($_POST['id']) && is_array($_POST['id'])){
    foreach($_POST['id'] as $index => $id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Mvim->delete(['id'=>$id]);
            continue;
        }

        $mvim['id'] = $id;
        if(isset($_POST['display']) && in_array($id, $_POST['display'])) $mvim['display'] = 1;
        else $mvim['display'] = 0;
        
        $Mvim->update($mvim);
    }
}
else{
    if(!empty($_FILES['file']['name'])){
        move_uploaded_file($_FILES['file']['tmp_name'], "../img/{$_FILES['file']['name']}");
        $_POST['img'] = $_FILES['file']['name'];
    }
    $_POST['display'] = 1;
    if(isset($_POST['id'])) $_POST['display'] = $Mvim->search(['id'=>$_POST['id']])['display'];
    $Mvim->update($_POST);
}

header("location:../admin.php?do=mvim");
?>