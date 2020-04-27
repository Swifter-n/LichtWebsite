<?php
global $db;
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'licht2';

$db = mysqli_connect($server, $user, $pass, $dbname) or die(mysqli_error($db));

if(!$db){
	die("Connection Failed : ".mysqli_connect_error());
}

?>