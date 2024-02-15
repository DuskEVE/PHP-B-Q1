<?php
include_once "./db.php";
if(isset($_POST['id'])){
    foreach($_POST['id'] as $index=>$id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Ad->delete(['id'=>$id]);
            continue;
        }
        $ad['id'] = $id;
        $ad['display'] = (isset($_POST['display']) && in_array($id, $_POST['display'])? 1:0);
        $Ad->update($ad);
    }
}
else{
    $_POST['display'] = 1;
    $Ad->update($_POST);
}

header("location:../admin.php?do=ad");
?>