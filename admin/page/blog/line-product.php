<?php
if(isset($_POST['submit'])){
    $date = date("Y-m-d H:i:s");
    $description = $_POST['description'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $tipe = $_POST['tipe'];

    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_name, "../img/".$file_name);
    mysqli_query($db, "INSERT INTO line_hight VALUES('', '$file_name', '$description', '$title', '$genre', '$tipe', '$date')");
    header("location:index.php?line");
}

$line = mysqli_query($db, "SELECT * FROM line_hight ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Line Product</h1>
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
                                <label>Genre</label>
                                <input class="form-control" type="text" name="genre" />
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input class="form-control" type="text" name="tipe" />
                            </div>
                             <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" id="text-ckeditor"></textarea>
                                 <script>CKEDITOR.replace('text-ckeditor');</script>
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
                               <th>Date Time</th>
                               <th>Title</th>
                               <th>Genre</th>
                               <th>Deskripsi</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($line)){?>
                        <?php while($row_line = mysqli_fetch_assoc($line)){?>
                            <tr>
                                <td><?= $row_line['date'];?></td>
                                <td><?= $row_line['judul'];?></td>
                                <td><?= $row_line['genre'];?></td>
                                <td><?= $row_line['tipe'];?></td>
                                <td><?= $row_line['konten'];?></td>
                               
                                <td>
                                <?php if($row_line['image'] == ""){echo "<img src='asset/no-images.png' width='88' class='img-responsive'/>";}else{?>
                                <img src="../img/<?= $row_line['image']?>" width="88" class="img-responsive"/>
                                <?php } ?>
                                </td>
                                <td class="center"><a href="index.php?line-update=<?=$row_line['id'];?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?line-delete=<?=$row_line['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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