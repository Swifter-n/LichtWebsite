<?php

if(isset($_POST['btn_search'])){
  $_SESSION['session_search'] = $_POST['keyword'];
  $keyword = $_SESSION['session_search'];
}else{
  $keyword = $_SESSION['session_search'];
}


/** Pagination **/

$per_page = 4;
$cur_page = 1;

if(isset($_GET['search'])){
    $cur_page = $_GET['search'];
    $cur_page = ($cur_page > 1) ? $cur_page : 1; 
}
$total_data = mysqli_num_rows(mysqli_query($db, "SELECT * FROM post WHERE title LIKE '%$keyword%'"));
$total_page = ceil($total_data / $per_page);
$offset = ($cur_page - 1) * $per_page;

/** End Of Pagination **/

$query = mysqli_query($db, "SELECT post.*, category.category_name
                            FROM post, category
                            WHERE category.id = post.category_id
                            AND post.title LIKE '%$keyword%'
                            ORDER BY id DESC LIMIT $per_page OFFSET $offset");
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h4>Result Search...</h4>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($query)){?>
                            <?php while($row_post = mysqli_fetch_assoc($query)){?>
                            <tr>
                                <td><?= $row_post['category_name'];?></td>
                                <td><?= $row_post['title'];?></td>
                                <td><?= $row_post['description'];?></td>
                                <td>
                                <?php if($row_post['image']==""){echo "<img src='asset/no-image.png' width='88'";}else{?>
                                <img src="../licht_blog/images/<?= $row_post['image'];?>" width="88" class="img-responsive" />
                                <?php } ?>
                                </td>
                                <td class="center"><a href="index.php?post-update=<?=$row_post['id'];?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?post-delete=<?=$row_post['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

            
                <?php if(isset($total_page)){ ?>
  <?php if($total_page > 1){?>

<nav class="text-center">
  <ul class="pagination">
  <?php if($cur_page > 1){?>
    <li>
        <a href="index.php?search=<?php echo $cur_page - 1;?>" aria-label="Previous">
            <span aria-hidden="true">Prev</span>
        </a>
    </li>
    <?php }else{ ?>
      <li class = "disabled"><span aria-hidden="true">Prev</span></li>
    <?php } ?>
    <?php if($cur_page < $total_page){?>
    <li>
      <a href="index.php?search=<?php echo $cur_page + 1;?>" aria-label="Next">
        <span aria-hidden="true">Next</span>
      </a>
    </li>
    <?php }else{ ?>
       <li class = "disabled"><span aria-hidden="true">Next</span></li>
       <?php } ?>
  </ul>
</nav>

<?php } ?>
<?php } ?>
</div>