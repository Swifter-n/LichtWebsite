<?php
if(isset($_POST['update'])){
    $id_update = $_POST['id_update'];
    $konten = $_POST['konten'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $tipe = $_POST['tipe'];

    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    if(move_uploaded_file($tmp_name, "../img/".$file_name)){
        mysqli_query($db, "UPDATE line_hight SET judul = '$title', genre = '$genre', tipe = '$tipe', konten = '$konten', image = '$file_name' WHERE id = '$id_update'");
    }else{
       mysqli_query($db, "UPDATE line_hight SET judul = '$title', genre = '$genre', tipe = '$tipe', konten = '$konten', image = '$file_name' WHERE id = '$id_update'");     
    }
    header("location:index.php?line");
}

$update_id = $_GET['line-update'];
$update_query = mysqli_query($db, "SELECT * FROM line_hight WHERE id = '$update_id'"); 
$row_update = mysqli_fetch_assoc($update_query);

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
                                <input class="form-control" type="text" name="title" value="<?=$row_update['judul'];?>" />
                            </div>
                             <div class="form-group">
                                <label>Genre</label>
                                <input class="form-control" type="text" name="genre" value="<?=$row_update['genre'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input class="form-control" type="text" name="tipe" value="<?=$row_update['tipe'];?>" />
                            </div>
                            
                             <div class="form-group">
                                <label>Description</label>
                               <textarea class="form-control" rows="3" name="konten" id="text-ckeditor"><?=$row_update['konten'];?></textarea>
                                 <script>CKEDITOR.replace('text-ckeditor');</script>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <?php if($row_update['image'] == ""){echo "<p><img src='asset/no-image.png' width='88' class='img-responsive'/></p>";}else{?>
                                <p><img src="../img/<?= $row_update['image'];?>" width="88" class="img-responsive"/></p>
                                <?php } ?>
                                <input type="file" name="file" />
                            </div>

                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="id_update" value="<?= $row_update['id']?>">
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
                                <th>Type</th>
                                <th>Description</th>
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
                                <?php if($row_line['image'] == ""){echo "<img src='asset/no-image.png' width='88' class='img-responsive'/>";}else{?>
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