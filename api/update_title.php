<?php
include_once "./db.php";

if(isset($_POST['id']) && is_array($_POST['id'])){
    foreach($_POST['id'] as $index => $id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Title->delete(['id'=>$id]);
            continue;
        }

        $title['id'] = $id;
        $title['text'] = $_POST['text'][$index];
        if(isset($_POST['display']) && $id==$_POST['display']) $title['display'] = 1;
        else $title['display'] = 0;
        
        $Title->update($title);
    }
}
else{
    if(!empty($_FILES['file']['name'])){
        move_uploaded_file($_FILES['file']['tmp_name'], "../img/{$_FILES['file']['name']}");
        $_POST['img'] = $_FILES['file']['name'];
    }
    $_POST['display'] = 0;
    if($Title->count()==0) $_POST['display'] = 1;
    else if(isset($_POST['id'])) $_POST['display'] = $Title->search(['id'=>$_POST['id']])['display'];
    $Title->update($_POST);
}

header("location:../admin.php?do=title");
?>