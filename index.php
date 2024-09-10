<?php
//將資料庫，連線程式載入 
require_once "./connections/conn_db.php";
// 如果session沒有啟動，則啟動session功能，這是跨網頁變數存取
(!isset($_SESSION)) ? session_start() : "";
?>
<!-- 載入共用PHP函數庫 -->
<?php require_once ("./php_lib.php"); ?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
   <?php require_once("head.php");?>

</head>



<body>




    <section id="header">
        <? require_once ("navbar.php"); ?>

    </section>


    <section id="contentA">
        <? require_once ("carousel.php"); ?>
    </section>



    <section id="contentB">
        <? require_once ("contentbigimg.php"); ?>

        <h3 class="content-center">商品種類</h3>
        <br><br>
        <? require_once ("type.php"); ?>


        <br><br><br><br><br><br><br>

        <h3 class="content-center">熱賣商品</h3>
        <br><br>

        <? require_once ("allobject.php"); ?>

        <? require_once ("storeimg.php"); ?>
    </section>


    <section id="footer">

        <? require_once ("footer.php"); ?>
    </section>

    <? require_once ("script.php"); ?>



</body>

</html>


