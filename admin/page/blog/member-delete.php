<?php
if(isset($_GET['member-delete'])){
	$apps_id = $_GET['member-delete'];

	mysqli_query($db, "DELETE FROM member WHERE id = '$apps_id'");
	header("location:index.php?member");
}

?>