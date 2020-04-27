<?php

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $job = $_POST['job'];
    $fb = $_POST['fb'];
    $linkedin = $_POST['linkedin'];
    $instagram = $_POST['instagram'];


    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_name, "../img/".$file_name);

    mysqli_query($db, "INSERT INTO member VALUES('',
                                                '$nama',
                                                '$job',
                                                '$fb',
                                                '$linkedin',
                                                '$instagram',
                                                '$file_name')");
    header("location: index.php?member");
}

$member = mysqli_query($db, "SELECT * FROM member ORDER BY id ASC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Data Members</h1>
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
                                <input class="form-control" type="text" name="nama" />
                            </div>
                            <div class="form-group">
                                <label>Job</label>
                                <input class="form-control" type="text" name="job" />
                            </div>
                             <div class="form-group">
                                <label>FB</label>
                                <input class="form-control" type="text" name="fb" />
                            </div>
                             <div class="form-group">
                                <label>Linkedin</label>
                                <input class="form-control" type="text" name="linkedin" />
                            </div>
                             <div class="form-group">
                                <label>Instagram</label>
                                <input class="form-control" type="text" name="instagram" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="file" />
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
                        <?php if(mysqli_num_rows($member)>0){?>
                            <?php while($row_member = mysqli_fetch_assoc($member)){?>
                            <tr>
                                <td><?= $row_member['nama'];?></td>
                                <td><?= $row_member['job'];?></td>
                                <td><?= $row_member['fb'];?></td>
                                <td><?= $row_member['linkedin'];?></td>
                                <td><?= $row_member['instagram'];?></td>
                                <td>
                                <?php if($row_member['image']==""){echo "<img src='asset/no-image.png' width='88'";}else{?>
                                <img src="../img/<?= $row_member['image'];?>" width="88" class="img-responsive" />
                                <?php } ?>
                                </td>
                                <td class="center"><a href="index.php?member-update=<?=$row_member['id'];?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?member-delete=<?=$row_member['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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