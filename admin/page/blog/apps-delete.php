<?php
if(isset($_GET['apps-delete'])){
	$apps_id = $_GET['apps-delete'];

	mysqli_query($db, "DELETE FROM apps WHERE id = '$apps_id'");
	header("location:index.php?apps");
}

?>