<?php
//將資料庫，連線程式載入 
require_once "./connections/conn_db.php";
// 如果session沒有啟動，則啟動session功能，這是跨網頁變數存取
(!isset($_SESSION)) ? session_start() : "";
?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("./php_lib.php"); ?>
<?php
//取得要返回的PHP頁面
if (isset($_GET['sPath'])) {
    $sPath = $_GET['sPath'] . ".php";
} else {
    //登入完成預設要進入首頁
    $sPath = "index.php";
}
//檢查是否完成登入驗證
if (isset($_SESSION['login'])) {
    header(sprintf("location: %s", $sPath));
}
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <?php require_once("head.php"); ?>
    <style type="text/css">
        .col-md-12 {
            background-repeat: no-repeat;
            background-color: #ffffff;
        }

        /* Card component */
        .mycard.mycard-container {
            max-width: 400px;
            height: 550px;
        }

        .mycard {
            background-color: #f7f7f7;
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        .profile-img-card {
            margin: 0 auto 10px auto;
            display: block;
            width: 100px;
        }

        .profile-name-card {
            font-size: 20px;
            text-align: center;
        }

        .form-signin input[type="email"],
        .form-signin input[type="password"],
        .form-signin button {
            width: 100%;
            height: 44px;
            font-size: 16px;
            display: block;
            margin-bottom: 20px;
        }

        .btn.btn-signin {
            font-weight: 700;
            background-color: rgb(104, 145, 162);
            color: white;
            height: 38px;
            transition: background-color 1s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: #003e52;
        }

        .other a {
            color: rgb(104, 145, 162);
        }

        .other a:hover,
        .other a:active,
        .other a:focus {
            color: rgb(12, 97, 33);
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



                <div class="col-md-12" style="margin-top:100px">
                    <!-- 模組：會員登入頁面 -->
                    <div class="mycard mycard-container">
                        <img id="profile-img" src="./images/logo03.svg" alt="logo" class="profile-img-card">
                        <p id="profile-name" class="profile-name-card">會員登入</p>
                        <form action="" method="post" class="form-signin" id="form1">
                            <input type="email" id="inputAccount" name="inputAccount" class="form-control"
                                placeholder="Account" required autofocus>
                            <input type="password" id="inputPassword" name="inputpassword" class="form-control"
                                placeholder="Password" required>
                            <button type="submit" class="btn btn-signin mt-4">登入</button>
                        </form>
                        <div class="other mt-5 text-center">
                            <p><a href="./register.php" class="text">加入會員</a></p>
                            <p><a href="#" class="text">Forget the password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="footer">

        <? require_once("footer.php"); ?>
    </section>

    <? require_once("script.php"); ?>
    <script type="text/javascript" src="commlib.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#form1").submit(function () {
                const inputAccount = $("#inputAccount").val();
                const inputPassword = MD5($("#inputPassword").val());//建立MD5的密碼驗證
                $("#loading").show();
                // 利用$ajax函數呼叫後台的auth_user.php驗證帳號密碼
                $.ajax({
                    url: 'auth_user.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        inputAccount: inputAccount,
                        inputPassword: inputPassword,
                    },
                    success: function (data) {
                        if (data.c == true) {
                            alert(data.m);
                            // window.location.reload();
                            window.location.href = "<?php echo $sPath; ?>";
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function (data) {
                        alert("系統目前無法連接到後台資料庫");
                    }
                });
            });
        });
    </script>

</body>

</html>