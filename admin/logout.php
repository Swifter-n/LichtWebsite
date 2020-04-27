<?php
session_start();

$_SESSION['admin_id'];
$_SESSION['admin_username'];

session_unset($_SESSION['admin_id']);
session_unset($_SESSION['admin_username']);

session_destroy();
header("location: login.php");

?>