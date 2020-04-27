<?php

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_name,"../img/".$file_name);

    mysqli_query($db, "INSERT INTO website VALUES('', '$title', '$description', '$link', '$file_name')");
    header("location: index.php?website");
}

$web = mysqli_query($db, "SELECT * FROM website ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Product Website</h1>
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
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" />
                            </div>
                             <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" id="text-ckeditor"></textarea>
                                 <script>CKEDITOR.replace('text-ckeditor');</script>

                            </div>
                           
                            <div class="form-group">
                                <label>LINK</label>
                               <input class="form-control" type="text" name="link" />
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>LINK</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($web)>0){?>
                            <?php while($row_web = mysqli_fetch_assoc($web)){?>
                            <tr>
                                <td><?= $row_web['title'];?></td>
                                <td><?= $row_web['description'];?></td>
                                <td><?= $row_web['link'];?></td>
                                <td>
                                <?php if($row_web['image']==""){echo "<img src='asset/no-image.png' width='88'";}else{?>
                                <img src="../img/<?= $row_web['image'];?>" width="88" class="img-responsive" />
                                <?php } ?>
                                </td>
                                <td class="center"><a href="index.php?website-update=<?=$row_web['id'];?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?website-delete=<?=$row_web['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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