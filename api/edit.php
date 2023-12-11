<?php
    include_once "./db.php";
    $table = $_POST['table'];
    $DB = ${ucfirst($table)};
    unset($_POST['table']);
    echo $table;

    foreach($_POST['text'] as $id=>$text){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])) $DB->delete(['id'=>$id]);
        else{
            $data = $DB->search(['id'=>$id]);
            $data['text'] = $text;
            if($table == 'title') $data['display'] = (isset($_POST['display']) && $_POST['display'] == $id)? 1:0;
            else if($table == 'ad') $data['display'] = (isset($_POST['display']) && in_array($id, $_POST['display']))? 1:0;
            $DB->update($data);
        }
    }

    header("location:../admin.php?do=$table");
?>