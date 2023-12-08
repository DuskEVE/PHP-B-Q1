<?php
    include_once "./db.php";
    $table = $_POST['table'];
    $DB = ${ucfirst($table)};
    unset($_POST['table']);

    foreach($_POST['text'] as $id=>$text){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])) $DB->delete(['id'=>$id]);
        else{
            $data = $DB->search(['id'=>$id]);
            $data['text'] = $text;
            $data['display'] = (isset($_POST['display']) && $_POST['display'] == $id)? 1:0;
            // print_r($data);
            $DB->update($data);
        }
    }

    header("location:../admin.php?do=$table");
?>