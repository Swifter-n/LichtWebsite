<?php
if(isset($_GET['post-delete'])){
	$delete_id = $_GET['post-delete'];
	mysqli_query($db, "DELETE FROM post WHERE id = '$delete_id'");
	header("location: index.php?post");
}
?>