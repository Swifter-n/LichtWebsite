<?php
ob_start();
include "licht_blog/function/config.php";
include "licht_blog/function/function.php";

// Jenis Browser
$browser = $_SERVER['HTTP_USER_AGENT'];
$chrome = '/Chrome/';
$firefox = '/Firefox/';
$ie = '/IE/';
if (preg_match($chrome, $browser))
    $data = "Chrome/Opera";
if (preg_match($firefox, $browser))
    $data = "Firefox";
if (preg_match($ie, $browser))
    $data = "IE";

// untuk mengambil informasi dari pengunjung
$ipaddress = $_SERVER['REMOTE_ADDR']."";
$browser = $data;
$tanggal = date('Y-m-d');
$kunjungan = 1;
// Daftarkan Kedalam Session Lalu Simpan Ke Database
if (!isset($_SESSION['counterdb'])){
$_SESSION['counterdb']=$ipaddress;
mysqli_query($db,"INSERT INTO counterdb (tanggal,ip_address,counter,browser) VALUES ('".$tanggal."','".$ipaddress."','".$kunjungan."','".$browser."')");
} 


/** PROSES INPUT **/
$error = '';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(!empty(trim($username)) && !empty(trim($email)) && !empty(trim($message))){
    mysqli_query($db, "INSERT INTO user VALUES('','$username','$email','$message')");
    header("location: index.php?sucsess#sucsess");
}else{
    header("location: index.php?failed#failed");
}
}
$members = mysqli_query($db, "SELECT * FROM member ORDER BY id ASC");
$slide = mysqli_query($db, "SELECT * FROM slide ORDER BY id DESC LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Licht Innovation adalah sebuah tim yang bergerak dibidang IT yang dikembangan dengan berbagai platform ">
    <meta name="author" content="Licht Innovation">

    <title>LICHT INNOVATION - Building a Games and Website</title>
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Bootstrap Core CSS -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/additional.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link href="css/slide.css" type="text/css" rel="stylesheet"/>

 
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Catamaran|Gloria+Hallelujah|Lobster|Orbitron|Pacifico|Questrial|Roboto|Shadows+Into+Light" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script|Bellefair|Berkshire+Swash|Courgette|Handlee|Pacifico|Spectral+SC|Teko" rel="stylesheet">


    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

   

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php include "views/header.php";?>
<div id="slide">
  <div class="container-fluid">
    <div class="row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/L3.jpg" alt="...">
      <div class="carousel-caption"> 
       <h5>Welcome to <br/>LICHT INNOVATION</h5>
      </div>
    </div>

    <?php if(mysqli_num_rows($slide)){?>
      <?php while ($row_slide = mysqli_fetch_assoc($slide)) {?>
    <div class="item">
      <img src="img/<?= $row_slide['image'];?>" alt="...">
      <div class="carousel-caption">
        <a id="link" href="licht_blog/index.php?detail=<?=$row_slide['link']?>">Read More</a>
      </div>
    </div>
  <?php } ?>
  <?php } ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
  </div>
</div>
    <!-- Header -->
    <header id="top" class="header" style="background-color: #302304; color: #ffffff">
        <div class="text-vertical-center ">
            <p>HI, WE ARE LICHT</p>
            <h2 style="border-radius: 5px;">Innovation Of Gold Generation</h2>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about full-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="head-text">ABOUT US</h1>
                    <h2 class="title-text"><strong>WHO WE ARE</strong></h2>
                </div>
                <div class="col-md-12">
                    <p>We are Licht!! Licht adalah perusahaan yang bergerak di bidang teknologi. Nama LICHT di ambil dari bahasa jerman yang berarti cahaya, Licht berdiri pada tanggal 22 November 2014 didirikan oleh Ibnu Yahya Saputra dan Muhammad Fathurrahman. Licht menangani jasa Web Deveploment, Application Deveploment dan Game Deveploment, serta juga menghasilkan karya-karya inovasi dalam perkembangan teknologi.</p>
                </div>
                <div class="col-md-6">
                <button class="accordion">OUR VISION</button>
                  <div class="panel">
                    <p>Membangun layanan IT yang inovatif & Berkualitas</p>
                  </div>
                </div>
                
                <div class="col-md-6">
                    <button class="accordion">OUR MISSION</button>
                  <div class="panel">
                    <ol>
                        <li>Menghasilkan karya - karya inovatif yang mempengaruhi perkembangan teknologi di dunia</li>
                        <li>Menjadi perusahaan yang berorientasi kepada masyarakat yang memiliki nilai sosial.</li>
                        <li>Membantu meningkatkan taraf hidup masyarakat</li>
                        <li>Menjadi perusahaan yang memiliki Intergritas dan Kredibilitas yang mumpuni</li></ol>
                  </div>

                </div>
                <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
            </div>
        </div>
    </section>

    <!-- Services -->
    
    <section id="services" class="services bg-primary full-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="head-text">WORKS</h1>
                    <h2>What do you want?</h2>
                    <div class="row">
                          <div class="col-md-3">
                            <a href="#">
                              <img class="img-responsive" src="img/l1.png" alt="..." style="width: 100%;padding: 15%;">
                            </a>
                          </div>
                          <div class="col-md-9">
                            <h4 class="media-heading"> Application Development</h4>
                           <p>Membuat suatu inovasi yang bermanfaat dan membantu dalam menyelesaikan masalah yang ada berbasis Mobile Apps</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <a href="#">
                              <img class="img-responsive" src="img/l2.png" alt="..." style="width: 100%; padding: 15%;">
                            </a>
                          </div>
                          <div class="col-md-9">
                            <h4 class="media-heading"> Games Development </h4>
                           <p>Membuat games - games yang menghibur dan menyenangkan untuk di mainkan.</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <a href="#">
                              <img class="img-responsive" src="img/l3.png" alt="..." style="width: 100%;padding: 15%;">
                            </a>
                          </div>
                          <div class="col-md-9">
                            <h4 class="media-heading"> Web-Based Development</h4>
                           <p id="bawah">Membuat suatu inovasi yang bermanfaat dan membantu dalam menyelesaikan masalah yang ada berbasis web-based</p>
                        </div>
                     </div>
                     </div>
                     <div class="row">
                <div class="col-md-6">
                    <img class="img-responsive" src="img/serv.png">
                </div>
                </div>
        </div>
        </div>
        <!-- /.container -->
    </section>
    <section id="member">
    <div class="container">
<div class="row">
<div class="col-md-12">
 <h3 class="text-center"> OUR MEMBERS</h3>
<div class="swiper-container">
    <div class="swiper-wrapper">
   <?php if(mysqli_num_rows($members)){?>
   <?php while($row_member = mysqli_fetch_assoc($members)){?>
      <div class="swiper-slide">
       <div class="imgBox">
         <img src="img/<?= $row_member['image'];?>">
       </div>
       <div class="detail">
         <h4 class="text-center"><?=$row_member['nama'];?></h4>
         <p class="text-center"><?=$row_member['job'];?></p>
         <ul class="social-bottom">
                            <li>
                                <a href="<?=$row_member['fb'];?>" target="_blank">
                                    <span class="fa-stack fa-md">
                                        <i class="fa fa-circle fa-stack-2x soc-out"></i>
                                        <i class="fa fa-facebook fa-stack-1x social"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=$row_member['linkedin'];?>" target="_blank">
                                    <span class="fa-stack fa-md">
                                        <i class="fa fa-circle fa-stack-2x soc-out"></i>
                                        <i class="fa fa-linkedin fa-stack-1x social"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=$row_member['instagram'];?>" target="_blank">
                                    <span class="fa-stack fa-md">
                                        <i class="fa fa-circle fa-stack-2x soc-out"></i>
                                        <i class="fa fa-instagram fa-stack-1x social"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
       </div>
      </div>
      <?php }?>
      <?php }?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>

  </div>
  </div>
  </div>
  </section>
  <script type="text/javascript" src="js/swiper.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>


    <!-- Map -->
    <section id="map" class="map full-page ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="head-text">CONTACT US</h1>
                    <h2 class="title-text"><strong>GET IN TOUCH</strong></h2>
                    <h4>
                        Ruko Atc jl. Raya Parung <br> Parung, Bogor, Jawa Barat <br> 16330
                    </h4>
                    <br>

                    <div>
                        <ul class="social-bottom">
                            <li>
                                <a href="#">
                                    <span class="fa-stack fa-md">
                                        <i class="fa fa-circle fa-stack-2x soc-out"></i>
                                        <i class="fa fa-facebook fa-stack-1x social"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa-stack fa-md">
                                        <i class="fa fa-circle fa-stack-2x soc-out"></i>
                                        <i class="fa fa-twitter fa-stack-1x social"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="fa-stack fa-md">
                                        <i class="fa fa-circle fa-stack-2x soc-out"></i>
                                        <i class="fa fa-youtube fa-stack-1x social"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <br>
                        <h4>Have a message?</h4>
                        <br>

                        <form class="form-horizontal" role="form" method="post">
                          <div class="form-group" id="sucsess">
                          <?php if(isset($_GET['sucsess'])){?>
                          <div class="col-md-10">
                              <div class="alert alert-success" role="alert">Thank You Very Much</div>
                          </div>    
                          <?php } ?>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-10">
                              <input type="text" name="username" class="form-control" placeholder="Your Name">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-10">
                              <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            </div>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-10">
                                <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
                            </div>
                            </div>
                          </div>
                           <div class="form-group" id="failed">
                           <?php if(isset($_GET['failed'])){?>
                            <div class="col-md-10">
                                 <div class="alert alert-warning" role="alert">Data Harus Di Isi</div>
                            </div>
                            <?php } ?>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-10">
                              <button type="submit" name="submit" class="btn-form"><strong>SUBMIT</strong> <span class="glyphicon glyphicon-chevron-right soc-in"></span></button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="img/loc.png">
            </div>
                </div>
                
        </div>
        </section>

    <footer>
        <div class="text-center">
            <p class="text-muted">Copyright &copy; LICHT <?php echo date("Y");?></p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/additional.js"></script>

</body>
</html>
<?php
mysqli_close($db);
ob_end_flush();
?>
