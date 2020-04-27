<?php
if(isset($_GET['slider-delete'])){
	$slider_id = $_GET['slider-delete'];
	mysqli_query($db, "DELETE FROM slide WHERE id ='$slider_id'");
	header("location:index.php?slider");
}

?>