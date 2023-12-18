<?php
    include_once "./db.php";
    $table = $_POST['table'];
    $DB = ${ucfirst($table)};
    unset($_POST['table']);

    foreach($_POST['id'] as $key=>$id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])) $DB->delete(['id'=>$id]);
        else{
            $data = $DB->search(['id'=>$id]);
            if(isset($_POST['text'])) $data['text'] = $_POST['text'][$id];
            if(isset($_POST['href'])) $data['href'] = $_POST['href'][$id];
            if($table == 'admin') $data['user'] = $_POST['user'][$id];
            if($table == 'title') $data['display'] = (isset($_POST['display']) && $_POST['display'] == $id)? 1:0;
            else if($table != 'title' && $table != 'admin'){
                $data['display'] = (isset($_POST['display']) && in_array($id, $_POST['display']))? 1:0;
            }
            $DB->update($data);
        }
    }

    

    header("location:../admin.php?do=$table");
?>