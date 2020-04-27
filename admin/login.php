<?php
ob_start();
session_start();
include "../licht_blog/function/config.php";
include "../licht_blog/function/function.php";

if(isset($_SESSION['admin_username'])) header("location: index.php");

if(isset($_POST['submit_login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($db, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    if(mysqli_num_rows($query)>0){
        $row_login = mysqli_fetch_assoc($query);
        $_SESSION['admin_id'] = $row_login['id'];
        $_SESSION['admin_username'] = $row_login['username'];
        header("location:index.php");
    }else{
        header("location:login.php?failed");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Administrator</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/sb-admin.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                            <?php if(isset($_GET['failed'])){?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hiden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                    Username atau Password Anda Salah. Silakan hubungi Administrator.
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus="autofocus" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" />
                                </div>
                                <input type="submit" name="submit_login" value="Login" class="btn btn-lg btn-success btn-block"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/sb-admin.js"></script>
</body>
</html>
<?php
mysqli_close($db);
ob_end_flush();
?>