<?php
$comment = mysqli_query($db, "SELECT * FROM comment ORDER BY id DESC LIMIT 4");
?>

<aside class="col-md-3">
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h3 class="panel-title">News Comments</h3>
    	</div>
    	<div class="panel-body latest-comments">
    		<ul>
            <?php if(mysqli_num_rows($comment)>0){?>
            <?php while($row = mysqli_fetch_assoc($comment)){?>

    		    <li><a href="index.php?detail"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <strong><?= $row['name'];?></strong>: <?= $row['reply'];?></a></li>
    		   <?php } ?>
               <?php } ?>
    		</ul>
    	</div>
    </div>
</aside>

