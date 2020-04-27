<?php
ob_start();
include "licht_blog/function/config.php";
include "licht_blog/function/function.php";

/** PROSES INPUT **/
/**
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(!empty(trim($username)) && !empty(trim($email)) && !empty(trim($message))){
    mysqli_query($db, "INSERT INTO user VALUES('','$username','$email','$message')");
    header("location: product.php?sucsess#sucsess");
}else{
    header("location: product.php?failed#failed");
}
}**/

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Licht Creative Innovation adalah sebuah karya inovasi dan project yang di kembangkan">
    <meta name="author" content="Licht Innovation">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Product Creative Innovation - Tempat Karya Inovasi dan Project Licht</title>

    <!-- CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/arcoding.css">
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/new.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/produk.css" type="text/css" rel="stylesheet"/>
    <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.26/css/uikit.min.css" />

    
    
    
    
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Catamaran|Gloria+Hallelujah|Lobster|Orbitron|Pacifico|Questrial|Roboto|Shadows+Into+Light" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

 <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- UIkit JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.26/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.26/js/uikit-icons.min.js"></script> 

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   

  
   


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php include "views/header.php";?>
   
  <?php include "views/content.php";?>

  <?php include "views/menu.php";?>

  <?php include "views/sub-footer.php"; ?>

  
<!-- jQuery -->
 

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/additional.js"></script>
  </body>
</html>