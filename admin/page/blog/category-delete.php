<?php
if(isset($_GET['category-delete'])){
	$delete_id = $_GET['category-delete'];
	mysqli_query($db, "DELETE FROM category WHERE id = '$delete_id'");
	header("location: index.php?category");
}
?>