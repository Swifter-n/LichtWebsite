<?php
ob_start();
session_start();
include "../licht_blog/function/config.php";
include "../licht_blog/function/function.php";

if(!isset($_SESSION['admin_id'])) header("location: login.php");
?>
<!DOCTYPE html>
<html>
<title></title>
<script src="ckeditor/ckeditor.js"></script>
<?php include("include/head.php") ?>
<body>
    <div id="wrapper">
        <?php include("include/header.php") ?>
        <div id="page-wrapper">
            <?php
            if (isset($_GET["category"])) include("page/blog/category.php");
            else if (isset($_GET["category-delete"])) include("page/blog/category-delete.php");
            else if (isset($_GET["category-update"])) include("page/blog/category-update.php");
            else if (isset($_GET["post"])) include("page/blog/post.php");
            else if (isset($_GET["post-delete"])) include("page/blog/post-delete.php");
            else if (isset($_GET["post-update"])) include("page/blog/post-update.php");
            else if (isset($_GET["comment"])) include("page/blog/comment.php");
            else if (isset($_GET["comment-delete"])) include("page/blog/comment-delete.php");
            else if (isset($_GET["comment-update"])) include("page/blog/comment-update.php");
            else if (isset($_GET["user"])) include("page/blog/user.php");
            else if (isset($_GET["user-delete"])) include("page/blog/user-delete.php");
            else if (isset($_GET["user-update"])) include("page/blog/user-update.php");
            else if (isset($_GET["slider"])) include("page/blog/slider.php");
            else if (isset($_GET["slider-delete"])) include("page/blog/slider-delete.php");
            else if (isset($_GET["slider-update"])) include("page/blog/slider-update.php");
            else if (isset($_GET["website"])) include("page/blog/website.php");
            else if (isset($_GET["website-delete"])) include("page/blog/website-delete.php");
            else if (isset($_GET["website-update"])) include("page/blog/website-update.php");
            else if (isset($_GET["apps"])) include("page/blog/apps.php");
            else if (isset($_GET["apps-delete"])) include("page/blog/apps-delete.php");
            else if (isset($_GET["apps-update"])) include("page/blog/apps-update.php");
            else if (isset($_GET["games"])) include("page/blog/games.php");
            else if (isset($_GET["games-delete"])) include("page/blog/games-delete.php");
            else if (isset($_GET["games-update"])) include("page/blog/games-update.php");
            else if (isset($_GET["member"])) include("page/blog/member.php");
            else if (isset($_GET["member-delete"])) include("page/blog/member-delete.php");
            else if (isset($_GET["member-update"])) include("page/blog/member-update.php");
            else if (isset($_GET["line"])) include("page/blog/line-product.php");
            else if (isset($_GET["line-delete"])) include("page/blog/line-delete.php");
            else if (isset($_GET["line-update"])) include("page/blog/line-update.php");
            else if (isset($_GET["project"])) include("page/blog/project.php");
            else if (isset($_GET["project-delete"])) include("page/blog/project-delete.php");
            else if (isset($_GET["visitor"])) include("page/blog/visitor.php");
            else if (isset($_GET["administrator"])) include("page/administrator/index.php");
            else if (isset($_GET["administrator-delete"])) include("page/administrator/delete.php");
            else if (isset($_GET["administrator-update"])) include("page/administrator/update.php");
            elseif (isset($_GET["post-search"]) || isset($_GET['search'])) include("page/blog/post-search.php");
            else include("page/home/index.php");
            ?>
        </div>
    </div>
    <?php include("include/footer.php") ?>
</body>
</html>
<?php
mysqli_close($db);
ob_end_flush();
?>