<?php
ob_start();
$query = mysqli_query($db, "SELECT * FROM category ORDER BY id ASC");
?>
<div id="menu">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <a href="../index.php"><img src="images/licht.png" alt="Logo Perusahaan" class="img-responsive"/></a>
        </div>

    <div class="col-sm-9">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <span class="navbar-brand visible-xs-block">LICHT INNOVATION &rarr;</span>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
               <li><a href="index.php?latest_post">Home</a></li>
                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Choose <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php if(mysqli_num_rows($query)>0){?>
            <?php while($row = mysqli_fetch_assoc($query)){?>
           <li><a href="index.php?category=<?php echo $row['id'];?>"><span class="<?php echo $row['icon'];?>" arial-hidden="true"></span>&nbsp;&nbsp;<?php echo $row['category_name'];?></a></li>
           <?php } ?>
           <?php } ?>
          </ul>
          </li>
            <li><form class="navbar-form navbar-left" role="search" method="post" action="index.php?search">
                <div class="form-group">
          <input type="text" name="keyword" class="form-control" placeholder="Search...">
        </div>
        <button type="submit" name="btn_search" class="btn btn-default">Search</button>
      </form></li>
              </ul>
            </div><!-- /.navbar-collapse -->
             <!-- /.container-fluid -->
          </div>
      </nav>
    </div>
  </div>
</div>
</div>
<?php
ob_end_flush();
?>
