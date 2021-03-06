<?php
/**PROSES INPUT**/
if(isset($_POST['submit'])){
    $post_id = $_POST['post_id'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $reply = $_POST['reply'];
    $date = date("Y-m-d H:i:s");

    mysqli_query($db, "INSERT INTO comment VALUES('','$post_id','$user','$email','$reply','$date')");
    header("location: index.php?comment");
}


$post = mysqli_query($db, "SELECT * FROM post ORDER BY id ASC");

$comment = mysqli_query($db, "SELECT comment.*, post.title
                                FROM comment, post
                                WHERE comment.post_id = post.id
                                ORDER BY comment.id DESC")
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Comment</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label>Post</label>
                                <select class="form-control" name="post_id">
                                    <option value=""> - choose - </option>
                                    <?php if(mysqli_num_rows($post)>0){?>
                                        <?php while($row_post = mysqli_fetch_assoc($post)){?>
                                    <option value="<?= $row_post['id'];?>"> <?= $row_post['title']?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User</label>
                                <input class="form-control" type="text" name="user" />
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="email" name="email" />
                            </div>
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea class="form-control" rows="3" name="reply" id="text-ckeditor"></textarea>
                                 <script>CKEDITOR.replace('text-ckeditor');</script>

                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th>User</th>
                                <th>E-mail</th>
                                <th>Reply</th>
                                <th>Datetime</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($comment)>0){?>
                            <?php while($row_comment = mysqli_fetch_assoc($comment)){?>
                            <tr>
                                <td><?= $row_comment['title'];?></td>
                                <td><?= $row_comment['name'];?></td>
                                <td><?= $row_comment['email']?></td>
                                <td><?= $row_comment['reply'];?></td>
                                <td><?= $row_comment['date'];?></td>
                                <td class="center"><a href="index.php?comment-update=<?= $row_comment['id'];?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?comment-delete=<?= $row_comment['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>