<?php
ob_start();
include "core/init.php";
date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Licht Innovation Blog adalah sebuah news dan activity licht Innovation">
    <meta name="author" content="Licht Innovation">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Blog - LICHT INNOVATION </title>

    <!-- CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    
   
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto|Roboto+Slab|Ubuntu" rel="stylesheet">



  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include "views/header.php"; ?>

    <div class="container">
    <div class="row">
    <div class="col-md-9">
    <?php
   if(isset($_GET['detail'])){
      include "pages/detail.php";
    } else if(isset($_GET['latest_post']) || isset($_GET['page'])){
      include "pages/latest_post.php";
    } else if(isset($_GET['category']) || isset($_GET['page-category'])){
      include "pages/category.php";
    }else if(isset($_GET['search']) || isset($_GET['page-search'])){
      include "pages/search.php";
    }else{
      include "pages/latest_post.php";
    }
    ?>
    </div>
    </div>
    </div>
    <?php include "views/footer.php"; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
mysqli_close($db);
ob_end_flush();
?>