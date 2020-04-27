<?php
if(isset($_GET['games-delete'])){
	$games_id = $_GET['games-delete'];

	mysqli_query($db, "DELETE FROM games WHERE id = '$games_id'");
	header("location:index.php?games");
}

?>