<?php
include_once "./db.php";
if($Admin->count($_POST) > 0) $_SESSION['user'] = $Admin->search($_POST)['user'];
echo $Admin->count($_POST);

?>