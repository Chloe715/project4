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
<style type="text/css">
    /* 輸入有錯誤時，顯示紅框 */
    table input:invalid{
        border: solid #a60004 3px;
    }

</style>
</head>

<body>
    <section id="header">
        <? require_once("navbar.php"); ?>

    </section>



    <section id="content">
        <div class="container-fluid">
            <div class="row">

                <? //require_once("sidebar.php"); ?>

                <div class="col-md-12" style="margin-top:100px">

                    <!-- 購物車內容 -->
                    <? require_once("cart_content.php"); ?>
                </div>
            </div>
        </div>
    </section>


    <section id="footer">

        <? require_once("footer.php"); ?>
    </section>

    <? require_once("script.php"); ?>
    <script type="text/javascript">
        //跳出確認訊息對話框
        function btn_confirmLink(message, url) {
            if (message == "" || url == "") {
                return false;
            }
            if (confirm(message)) {
                window.location = url;
            }
            return false;
        }

    </script>

    <script type="text/javascript">
        //將變更的數量寫入後台資料庫
        $("input").change(function () {
            var qty = $(this).val();
            const cartid = $(this).attr("cartid");
            if (qty <= 0 || qty >= 20) {
                alert("請輸入正確的數量，限制最多20個。");
                return false;
            }
            $.ajax({
                url: 'change_qty.php',
                type: 'post',
                dataType: 'json',
                data: { cartid: cartid, qty: qty, },
                success: function (data) {
                    if (data.c == true) {
                        //alert(data.m);
                        window.location.reload();
                    } else {
                        alert(data.m);
                    }
                },
                error: function (data) {
                    alert("系統目前無法連線。");
                }
            });
        });
    </script>


</body>

</html>