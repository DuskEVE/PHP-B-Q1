<?php
include_once "./db.php";
if(!isset($_SESSION['user'])) header("location:../index.php");

if(isset($_POST['id'])){
    foreach($_POST['id'] as $index=>$id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Menu->delete(['id'=>$id]);
            continue;
        }
        if($id != 0) $menu['id'] = $id;
        if(isset($_POST['menu_id'])) $menu['menu_id'] = $_POST['menu_id'];
        $menu['text'] = $_POST['text'][$index];
        $menu['href'] = $_POST['href'][$index];
        if(isset($_POST['display']) && in_array($id, $_POST['display'])) $menu['display'] = 1;
        else $menu['display'] = 0;
        $Menu->update($menu);
    }
}
else{
    $_POST['display'] = 1;
    $_POST['menu_id'] = 0;
    $Menu->update($_POST);
}

header("location:../admin.php?do=menu");
?>