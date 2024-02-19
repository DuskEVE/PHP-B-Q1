<?php
include_once "./db.php";
$Total->update($_POST);
header("location:../admin.php?do=total");
?>