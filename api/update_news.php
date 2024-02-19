<?php
include_once "./db.php";
if(isset($_POST['id'])){
    foreach($_POST['id'] as $index=>$id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $News->delete(['id'=>$id]);
            continue;
        }
        $news['id'] = $id;
        $news['display'] = (isset($_POST['display']) && in_array($id, $_POST['display'])? 1:0);
        $News->update($news);
    }
}
else{
    $_POST['display'] = 1;
    $News->update($_POST);
}

header("location:../admin.php?do=news");
?>