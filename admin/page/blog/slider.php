<?php
/** PROSES INPUT ***/
if(isset($_POST['submit'])){
    $link = $_POST['link'];
    $date = date("Y-m-d H:i:s");

    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_name, "../img/".$file_name);
    mysqli_query($db, "INSERT INTO slide VALUES('','$file_name','$link','$date')");
    header("location:index.php?slider"); 
}


$slider = mysqli_query($db, "SELECT * FROM slide ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Slider</h1>
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
                                <th>Link</th>
                                <th>Image</th>
                                <th>Date Time</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($slider)>0){?>
                                <?php while($row_slider = mysqli_fetch_assoc($slider)){?>
                            <tr>
                                <td><?= $row_slider['link'];?></td>
                                <td>
                                <?php if($row_slider['image']==""){echo "<img src='asset/no-image.png' width='88'";}else{?>
                                <img src="../img/<?= $row_slider['image'];?>" width="88" class="img-responsive" />
                                <?php } ?>
                                </td>
                                <td><?= $row_slider['date'];?></td>
                                <td class="center"><a href="index.php?slider-update=<?=$row_slider['id'];?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?slider-delete=<?=$row_slider['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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