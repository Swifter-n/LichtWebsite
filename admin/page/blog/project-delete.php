<?php
if(isset($_GET['project-delete'])){
	$id = $_GET['project-delete'];
	mysqli_query($db, "DELETE FROM request WHERE id = '$id'");
	header("location: index.php?project");
}

?>