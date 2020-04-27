<?php
if(isset($_POST['update'])){
    $member_id = $_POST['member_id'];
    $nama = $_POST['nama'];
    $job = $_POST['job'];
    $fb = $_POST['fb'];
    $linkedin = $_POST['linkedin'];
    $instagram = $_POST['instagram'];

    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    if(move_uploaded_file($tmp_name, "../img/".$file_name)){
        mysqli_query($db, "UPDATE member SET nama = '$nama', job = '$job', fb = '$fb', linkedin = '$linkedin', instagram = '$instagram', image = '$file_name' WHERE id = '$member_id'");
    }else{
        mysqli_query($db, "UPDATE member SET nama='$nama', job = '$job', fb = '$fb', linkedin = '$linkedin', instagram = '$instagram' WHERE id = '$member_id'");     
    }
    header("location:index.php?member");
}

$edit = $_GET['member-update'];
$edit_query = mysqli_query($db, "SELECT * FROM member WHERE id = '$edit'");
$row_edit = mysqli_fetch_assoc($edit_query);

$web = mysqli_query($db, "SELECT * FROM member ORDER BY id ASC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Update Data Member</h1>
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
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" type="text" name="nama" value="<?= $row_edit['nama']?>" />
                            </div>
                            <div class="form-group">
                                <label>Job</label>
                               <input class="form-control" type="text" name="job" value="<?= $row_edit['job']?>" />
                            </div>
                            <div class="form-group">
                                <label>fb</label>
                               <input class="form-control" type="text" name="fb" value="<?= $row_edit['fb']?>" />
                            </div>
                            <div class="form-group">
                                <label>Linkedin</label>
                               <input class="form-control" type="text" name="linkedin" value="<?= $row_edit['linkedin']?>" />
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                               <input class="form-control" type="text" name="instagram" value="<?= $row_edit['instagram']?>" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <?php if($row_edit['image']==""){echo "<img src='asset/no-image.png' width='88'";}else{?>
                                <p><img src="../img/<?=$row_edit['image']?>" width='88'></p>
                                <?php } ?>
                                <input type="file" name="file" />
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Edit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="member_id" value="<?= $row_edit['id'];?>">
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
                                <th>Nama</th>
                                <th>Job</th>
                                <th>FB</th>
                                <th>Linkedin</th>
                                <th>Instagram</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($web)){?>
                            <?php while($row_web = mysqli_fetch_assoc($web)){?>
                            <tr>
                                <td><?= $row_web['nama'];?></td>
                                <td><?= $row_web['job'];?></td>
                                <td><?= $row_web['fb'];?></td>
                                <td><?= $row_web['linkedin'];?></td>
                                <td><?= $row_web['instagram'];?></td>
                                <td>
                                <?php if($row_web['image']==""){echo "<img src='asset/no-image.png' width='88'";}else{?>
                                <img src="../img/<?= $row_web['image'];?>" width="88" class="img-responsive" />
                                <?php } ?>
                                </td>
                                <td class="center"><a href="index.php?member-update=<?=$row_web['id'];?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?member-delete=<?=$row_web['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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