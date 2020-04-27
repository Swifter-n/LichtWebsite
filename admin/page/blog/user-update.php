<?php
/**INPUT PROSES**/
if(isset($_POST['update'])){
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    mysqli_query($db, "UPDATE user SET username = '$username', email = '$email', message = '$message'
                        WHERE id = '$user_id'");
    header("location: index.php?user");
}
/** TAMPIL EDIT DATA **/
$user_id = $_GET['user-update'];
$update = mysqli_query($db, "SELECT * FROM user WHERE id = '$user_id'");
$row_update = mysqli_fetch_assoc($update);

$user = mysqli_query($db, "SELECT * FROM user ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; User</h1>
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
                                <label>Name</label>
                                <input class="form-control" type="text" name="username" value="<?= $row_update['username'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" value="<?= $row_update['email'];?>"/>
                            </div>
                            <div class="form-group">
                                <label>Messages</label>
                                <textarea class="form-control" rows="3" name="message"><?= $row_update['message'];?></textarea>
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="user_id" value="<?= $row_update['id'];?>">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Messages</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($user)){?>
                            <?php while($row_user = mysqli_fetch_assoc($user)){?>
                            <tr>
                                <td><?= $row_user['username'];?></td>
                                <td><?= $row_user['email'];?></td>
                                <td><?= $row_user['message'];?></td>
                                <td class="center"><a href="index.php?user-update=<?= $row_user['id'];?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?user-delete=<?= $row_user['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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