<?php

if(isset($_GET['line-delete'])){
	$line_id = $_GET['line-delete'];

	mysqli_query($db, "DELETE FROM line_hight WHERE id = '$line_id'");
	header("location:index.php?line");
}
?>