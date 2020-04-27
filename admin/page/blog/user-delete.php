<?php
if(isset($_GET['user-delete'])){
	$id_user = $_GET['user-delete'];

	mysqli_query($db, "DELETE FROM user WHERE id = '$id_user'");
	header("location: index.php?user");
}

?>