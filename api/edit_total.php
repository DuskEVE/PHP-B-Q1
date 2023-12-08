<?php
    include_once "./db.php";

    $_POST['total'];
    $total = $Total->search(['id'=>1]);
    $total['total'] = $_POST['total'];
    $Total->update($total);

    header("location:../admin.php?do=total");
?>