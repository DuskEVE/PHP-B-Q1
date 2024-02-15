<?php
include_once "./db.php";

if(isset($_POST['id']) && is_array($_POST['id'])){
    foreach($_POST['id'] as $index => $id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Image->delete(['id'=>$id]);
            continue;
        }

        $image['id'] = $id;
        if(isset($_POST['display']) && in_array($id, $_POST['display'])) $image['display'] = 1;
        else $image['display'] = 0;
        
        $Image->update($image);
    }
}
else{
    if(!empty($_FILES['file']['name'])){
        move_uploaded_file($_FILES['file']['tmp_name'], "../img/{$_FILES['file']['name']}");
        $_POST['img'] = $_FILES['file']['name'];
    }
    $_POST['display'] = 1;
    if(isset($_POST['id'])) $_POST['display'] = $Image->search(['id'=>$_POST['id']])['display'];
    $Image->update($_POST);
}

header("location:../admin.php?do=image");
?>