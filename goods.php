<?php
//將資料庫，連線程式載入 
require_once "./connections/conn_db.php";
// 如果session沒有啟動，則啟動session功能，這是跨網頁變數存取
(!isset($_SESSION)) ? session_start() : "";
?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("./php_lib.php"); ?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <?php require_once("head.php"); ?>
    <link rel="stylesheet" href="fancybox-2.1.7/source/jquery.fancybox.css">

</head>

<body>
    <section id="header">
        <? require_once("navbar.php"); ?>

    </section>

    <section id="content">
        <div class="container-fluid">
            <div class="row">

                <? require_once("sidebar.php"); ?>

                <div class="col-md-10" style="margin-top:100px">

                    <!-- 麵包屑 -->
                    <? require_once("breadcrumb.php"); ?>

                    <hr style="margin:-14px 150px 20px 5px ;border:1px solid #99a7b7">

                    <!-- 商品詳細清單 -->
                    <? require_once("goods_content.php"); ?>

                </div>
            </div>
        </div>
        <br><br><br><br>
        <!-- 頁數 -->
        <? //require_once("pages.php"); ?>
    </section>


    <section id="footer">

        <? require_once("footer.php"); ?>
    </section>

    <? require_once("script.php"); ?>


</body>

</html>