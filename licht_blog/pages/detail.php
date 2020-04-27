<?php

$error = '';
if(isset($_POST['btn_submit'])){
  $post_id = $_POST['post_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $comments = $_POST['comments'];
  $date = date("Y-m-d H:i:s");

  if(!empty(trim($name)) && !empty(trim($comments))){
    mysqli_query($db, "INSERT INTO comment VALUES('','$post_id','$name','$email','$comments','$date')");
    header("location:index.php?detail=$post_id&success-comment#success");
}else{
  header("location: index.php?detail=$post_id&failed#failed");
}
}

$detail_id = $_GET['detail'];
$query = mysqli_query($db, "SELECT post.*, category.category_name, category.icon
							FROM post, category
							WHERE category.id = post.category_id
							AND post.id = '$detail_id'");
if(mysqli_num_rows($query)==0) header("index.php");
$row_detail = mysqli_fetch_assoc($query);

/** TAMPIL COMMENT **/
$comment = mysqli_query($db, "SELECT * FROM comment WHERE post_id = '$detail_id'
                              ORDER BY id DESC");
$data = mysqli_num_rows($comment);
?>

<div id="detail">
<div class="container">
<div class="row">
<div class="col-md-9">
    <h1><?php echo $row_detail['title'];?></h1>
      <div class="meta">
        <a href="index.php?category=<?= $row_detail['category_id'];?>"><span class="<?php echo $row_detail['icon'];?>" aria-hidden="true"></span> <?= $row_detail['category_name'];?></a> -  <?= tgl_indo($row_detail['date']);?>
    </div>
    <img src="images/<?= $row_detail['image'];?>" class="img-responsive btn-block">
    <p><?= $row_detail['description'];?></p>

 
    <!-- Komentar -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?= $data;?> Komentar</h3>
      </div>
      <div class="panel-body">
      <?php if(mysqli_num_rows($comment)){?>
        <?php while($row_comment = mysqli_fetch_assoc($comment)){?>
        <ul class="list-group">
          <li class="list-group-item">
            <strong><?= $row_comment['name'];?></strong>: <?= $row_comment['reply'];?>
          </li>
          <?php } ?>
          <?php } ?>
        </ul>
      </div>
    </div>

    <!-- Form Komentar -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Komentar</h3>
      </div>
      <div class="panel-body" id="success">
        <form class="form-horizontal" method="post">
        <?php if(isset($_GET['success-comment'])){?>
       <div class="form-group">
            <div class="col-sm-10 text-center">
              <div class="alert alert-success" role="alert">Thank you for comment</div>
            </div>
          </div>
          <?php } ?>
          <div class="form-group">
            <label for="inputNama3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="inputNama3">
            </div>
          </div>
          <div class="form-group">
            <label for="inputNama3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="inputNama3">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPesan3" class="col-sm-2 control-label">Comment</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="comments" rows="3"></textarea>
            </div>
          </div>
          <?php if(isset($_GET['failed'])){?>
          <div class="form-group" id="failed">
            <div class="col-sm-10 text-center">
              <div class="alert alert-warning" role="alert">Tolong data isi data dengan lengkap</div>
            </div>
          </div>
          <?php } ?>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="btn_submit" class="btn btn-default">Send</button>
              <input type="hidden" name="post_id" value="<?php echo $detail_id;?>">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php include "pages/aside.php";?>
    </div>
    </div>
</div><!-- End Of Detail -->


