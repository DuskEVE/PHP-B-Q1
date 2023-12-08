<?php
    include_once "./db.php";

    $table = ${ucfirst($_GET['do'])};
    $data = $table->search(['id'=>1]);
    $data[$_GET['do']] = $_POST[$_GET['do']];
    $table->update($data);

    // if(isset($_GET['do']) && $_GET['do'] == 'total'){
    //     $_POST['total'];
    //     $total = $Total->search(['id'=>1]);
    //     $total['total'] = $_POST['total'];
    //     $Total->update($total);
    // }
    // else if(isset($_GET['do']) && $_GET['do'] == 'bottom'){
    //     $_POST['bottom'];
    //     $bottom = $Bottom->search(['id'=>1]);
    //     $bottom['bottom'] = $_POST['bottom'];
    //     $Bottom->update($bottom);
    // }
    
    header("location:../admin.php?do={$_GET['do']}");
?>