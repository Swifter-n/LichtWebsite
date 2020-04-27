<?php
if(isset($_GET['website-delete'])){
	$website_id = $_GET['website-delete'];

	mysqli_query($db, "DELETE FROM website WHERE id = '$website_id'");
	header("location:index.php?website");
}
?>

