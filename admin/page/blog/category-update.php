<?php
if(isset($_POST['update'])){
    $update_id = $_POST['update_id'];
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    mysqli_query($db, "UPDATE category SET category_name = '$name', icon = '$icon' WHERE id = '$update_id'");
    header("location: index.php?category");
}


$update_id = $_GET['category-update'];
$update = mysqli_query($db, "SELECT * FROM category WHERE id = '$update_id'");
$row_update = mysqli_fetch_assoc($update);

$category = mysqli_query($db, "SELECT * FROM category ORDER BY id DESC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Category</h1>
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
                                <input class="form-control" type="text" name="name" value="<?= $row_update['category_name'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Icon</label>
                                <input class="form-control" type="text" name="icon" value="<?= $row_update['icon'];?>" />
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="update_id" value="<?= $row_update['id'];?>>
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
                                <th>Icon</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($category)){?>
                            <?php while($row_category = mysqli_fetch_assoc($category)){?>
                            <tr>
                                <td><?= $row_category['category_name'];?></td>
                                <td><?= $row_category['icon'];?></td>
                                <td class="center"><a href="index.php?category-update=<?= $row_category['id'];?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?category-delete=<?= $row_category['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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