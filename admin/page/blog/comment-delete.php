<?php
if(isset($_GET['comment-delete'])){
	$comment_id = $_GET['comment-delete'];
	mysqli_query($db, "DELETE FROM comment WHERE id = '$comment_id'");
	header("location: index.php?comment");
}
?>