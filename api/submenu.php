<?php
include_once "./db.php";

if(isset($_POST['id'])){
    foreach($_POST['id'] as $index => $id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])) $Menu->delete(['id'=>$id]);
        else{
            $data = $Menu->search(['id'=>$id]);
            $data['text'] = $_POST['text'][$index];
            $data['href'] = $_POST['href'][$index];
            $Menu->update($data);
        }
    }
}

if(isset($_POST['newText'])){
    foreach($_POST['newText'] as $index => $text){
        $data = ['text'=>$text, 'href'=>$_POST['newHref'][$index], 'menu_id'=>$_POST['menu_id']];
        $Menu->update($data);
    }
}

header("location:../admin.php?do=menu");

?>