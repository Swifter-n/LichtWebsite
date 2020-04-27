<?php
ob_start();
include "licht_blog/function/config.php";
include "licht_blog/function/function.php";

/** PROSES INPUT **/

if(isset($_POST['submit'])){
	$waktu = date("Y-m-d H:i:s");
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $tema = $_POST['tema'];
    $jenis = $_POST['jenis'];
    $kategori = $_POST['kategori'];
    $deadline = $_POST['deadline'];
    $kesulitan = $_POST['kesulitan'];
    $add = $_POST['add'];

    if(!empty(trim($jenis)) && !empty(trim($kategori)) && !empty(trim($deadline))){
    mysqli_query($db, "INSERT INTO request VALUES('', '$waktu', '$nama', '$email', '$telp', '$alamat', '$tema', '$jenis', '$kategori', '$deadline', '$kesulitan', '$add')");
    echo "<script>alert('Selamat Data Anda Sudah Terdaftar');</script>";
}else{
    echo "<script>alert('Maaf Data Belum Lengkap, Silakan Periksa Kembali');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Licht Creative Innovation adalah sebuah karya inovasi dan project yang di kembangkan">
    <meta name="author" content="Licht Innovation">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Project Request - Buat Projectmu dengan Licht</title>

    <!-- CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/additional.css" rel="stylesheet">
     <link href="css/animate.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Catamaran|Gloria+Hallelujah|Lobster|Orbitron|Pacifico|Questrial|Roboto|Shadows+Into+Light" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


  



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php include "views/header.php";?>
   
 <div class="container">
	<div class="row">
		<div class="col-md-8">
		<div id="project" style="margin-top: 150px; background: url(img/);">
			<h3>Project Request</h3>
			<div style="border: 1px solid #fff; margin-bottom: 10px"></div>
			<form method="POST">
	<div class="form-group">
    <p>Name:</p>
    <input type="text" class="form-control" id="exampleInputtext1" placeholder="Name" name="nama" required/>
  </div>
  <div class="form-group">
    <p>Email address:</p>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required/>
  </div>
   <div class="form-group">
    <p>Phone:</p>
    <input type="text" class="form-control" id="exampleInputtext1" placeholder="Phone" name="telp" required />
  </div>
  <div class="form-group">
  <p>Address:</p>
  <textarea class="form-control" rows="3" name="alamat"></textarea>
  </div>
  <div class="form-group">
    <p>Theme Project:</p>
    <input type="text" class="form-control" id="exampleInputtext1" placeholder="Theme Project" name="tema">
  </div>
  <div class="form-group">
  <p>Type Request:</p>
  <select class="form-control" name="jenis">
   <option>- Choose -</option>
  <option value="Personal">Personal</option>
  <option value="Company">Company</option>
  <option value="Goverment">Goverment</option>
  <option value="Etc">Etc</option>
</select>
</div>
<div class="form-group">
  <p>Category Project:</p>
  <select class="form-control" name="kategori">
    <option>- Choose -</option>
  <option value="Website Application">Website Application</option>
  <option value="Desktop Application">Desktop Application</option>
  <option value="Mobile Application">Mobile Application</option>
  <option value="Design">Design</option>
  <option value="Games">Games</option>
  <option value="Etc">Etc</option>
</select>
</div>
  <div class="form-group">
  <p>Deadline Project:</p>
  <select class="form-control" name="deadline">
  <option>- Choose -</option>
  <option value="Less than a week">Less than a week</option>
  <option value="A week">A week</option>
  <option value="A few Weeks">A few Weeks</option>
  <option value="Less than a month">Less than a month</option>
  <option value="A month">A month</option>
  <option value="A few months">A few months</option>
  <option value="Less than a year">Less than a year</option>
  <option value="A year">A year</option>
  <option value="A few years">A few years</option>
</select>
</div>
 <div class="form-group">
  <p>Difficulty Project:</p>
  <select class="form-control" name="kesulitan" required>
  <option>- Choose -</option>
  <option value="Hard">Hard</option>
  <option value="Medium">Medium</option>
  <option value="Easy">Easy</option>
</select>
</div>
<div class="form-group">
  <p>Additional:</p>
  <textarea class="form-control" rows="3" name="add"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
</form>
		</div>
	</div>
</div>
</div>


<?php include "views/sub-footer.php";?>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/additional.js"></script>
  </body>
</html>

