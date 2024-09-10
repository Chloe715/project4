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
        .input-group>.form-control {
            width: 100%;
        }

        span.error-tips,
        span.error-tips::before {
            font-family: "微軟正黑體";
            color: #d11414;
            font-weight: 600;
            font-size: 14px;
            padding-top: 5px;
            padding-left: 5px;
            content: "";
        }

        span.valid-tips,
        span.valid-tips::before {
            font-family: "Font Awesome 5 Free";
            color: greenyellow;
            font-weight: 600;
            font-size: 14px;
            padding-top: 5px;
            padding-left: 5px;
            content: "\f00c";
        }
    </style>
</head>

<body>
    <section id="header">
        <? require_once("navbar.php"); ?>

    </section>
    <!-- 送出表單將資料寫入DB -->
    <?php
    if (isset($_POST['formctl']) && $_POST['formctl'] == 'reg') {
        $email = $_POST['email'];
        $pw1 = md5($_POST['pw1']);
        $cname = $_POST['cname'];
        $tssn = $_POST['tssn'];
        $birthday = $_POST['birthday'];
        $mobile = $_POST['mobile'];
        $myzip = $_POST['myZip'] == '' ? null : $_POST['myZip'];
        $address = $_POST['address'] == '' ? null : $_POST['address'];
        $imgname = $_POST['uploadname'] == '' ? null : $_POST['uploadname'];
        $insertsql = "INSERT INTO member(email,pw1,cname,tssn,birthday,imgname) values ('" . $email . "','" . $pw1 . "','" . $cname . "','" . $tssn . "','" . $birthday . "','" . $imgname . "') ";
        $Result = $link->query($insertsql);
        $emailid = $link->lastInsertId(); //讀入新增會員編號
        if ($Result) {
            // 將會員的姓名、電話和地址寫入addbook
            $insertsql = "INSERT into addbook(emailid,setdefault,cname,mobile,myzip,address) values ('" . $emailid . "','1','" . $cname . "','" . $mobile . "','" . $myzip . "','" . $address . "') ";
            $Result = $link->query($insertsql);
            $_SESSION['login'] = true;//設定會員註冊完直接登入
            $_SESSION['emailid'] = $emailid;
            $_SESSION['email'] = $email;
            $_SESSION['cname'] = $cname;
            echo "<script language='javascript'>alert('謝謝你，會員資料己完成註冊');location.href='index.php';</script>";
        }

    }
    ?>


    <section id="content">
        <div class="container-fluid">
            <div class="row">

                <? require_once("sidebar.php"); ?>

                <div class="col-md-10" style="margin-top:100px">
                    <!-- 會員註冊頁面 -->
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1>會員註冊</h1>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-2 text-left">
                            <form id="reg" name="reg" action="./register.php" method="POST">
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="*email 帳號">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="pw1" id="pw1" class="form-control"
                                        placeholder="*密碼">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="pw2" id="pw2" class="form-control"
                                        placeholder="*再次確認密碼">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="cname" id="cname" class="form-control"
                                        placeholder="*姓名">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="tssn" id="tssn" class="form-control"
                                        placeholder="*身份證字號">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="birthday" id="birthday" onfocus="(this.type='date')"
                                        class="form-control" placeholder="*生日">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="mobile" id="mobile" class="form-control"
                                        placeholder="*手機號碼">
                                </div>

                                <div class="input-group mb-3">
                                    <select name="myCity" id="myCity" class="form-control">
                                        <option value="">請選擇市區</option>
                                        <?php $city = "SELECT * from city where State=0";
                                        $city_rs = $link->query($city);
                                        while ($city_rows = $city_rs->fetch()) { ?>
                                            <option value="<?php echo $city_rows['AutoNo']; ?>">
                                                <?php echo $city_rows['Name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select><br>
                                    <select name="myTown" id="myTown" class="form-control">
                                        <option value="">請選擇地區</option>
                                    </select>
                                </div>
                                <label class="form-label" for="address" id="zipcode" name="zipcode">郵遞區號：地址</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="MyZip" id="myZip" value="">
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="地址">
                                </div>
                                <label for="fileToUpload" class="form-label">上傳相片</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"
                                        title="請上傳相片圖示" accept="image/x-png,image/jepg,image/gif,image/jpg">
                                    <p><button class="btn btn-secondary btn-sm" type="button" id="uploadForm" name="uploadForm" style="margin-top:15px">上傳</button></p>

                                    <!-- bootstrap progress -->
                                    <div id="progress-div01" class="progress" style="width:100%;display:none;">
                                        <div id="progress-bar01" class="progress-bar progress-bar-striped"
                                            role="progressbar" style="width:0%" aria-valuenow="10" aria-valuemin="0"
                                            aria-valuemax="100">0%
                                        </div>
                                    </div>
                                    <input type="hidden" name="uploadname" id="uploadname" value="">
                                    <img id="showimg" name="showimg" src="" alt="photo" style="display:none;"
                                        class="img-fluid">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="captcha" id="captcha" value="">
                                    <a href="javascript:void(0)" title="按我更新認證" onclick="getCaptcha();">
                                        <canvas id="can"></canvas>
                                    </a>
                                    <input type="text" name="recaptcha" id="recaptcha" class="form-control"
                                        placeholder="請輸入認證碼">
                                </div>
                                <input type="hidden" name="formctl" id="formctl" value="reg">

                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-success btn-sm">送出</button>
                                </div>
                            </form>

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
    <script type="text/javascript" src="./commlib.js"></script>

    <script type="text/javascript" src="jquery.validate.js"></script>

    <script type="text/javascript">
        // 驗證欄位start
        //自訂身份證格式驗證
        jQuery.validator.addMethod("tssn", function (value, element, param) {
            var tssn = /^[a-zA-Z]{1}[1-2]{1}[0-9]{8}$/;
            return this.optional(element) || (tssn.test(value));
        });
        //自訂手機格式驗證
        jQuery.validator.addMethod("checkphone", function (value, element, param) {
            var checkphone = /^[0]{1}[9]{1}[0-9]{8}$/;
            return this.optional(element) || (checkphone.test(value));
        });
        //自訂郵遞區號驗證
        jQuery.validator.addMethod("checkMyTown", function (value, element, param) {
            return (value !== "");
        });


        //驗證form #reg表單
        $('#reg').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: 'checkemail.php'
                },
                pw1: {
                    required: true,
                    maxlength: 20,
                    minlength: 4,
                },
                pw2: {
                    required: true,
                    equalTo: '#pw1'
                },
                cname: {
                    required: true,
                },
                tssn: {
                    required: true,
                    tssn: true,
                },
                birthday: {
                    required: true,
                },
                mobile: {
                    required: true,
                    checkphone: true,
                },
                address: {
                    required: true,
                },
                myTown: {
                    checkMyTown: true,
                },
                recaptcha: {
                    required: true,
                    equalTo: '#captcha',
                },
            },
            messages: {
                email: {
                    required: 'email信箱不得為空白',
                    email: 'email信箱格式有誤',
                    remote: 'email信箱己經註冊'
                },
                pw1: {
                    required: '密碼不得為空白',
                    maxlength: '密碼最大長度為20位（4-20位英文字母與數字的組合）',
                    minlength: '密碼最小長度為4位（4-20位英文字母與數字的組合）',
                },
                pw2: {
                    required: '請確認密碼不得為空白',
                    equalTo: '兩次輸入的密碼必須一致'
                },
                cname: {
                    required: '使用者名稱不得為空白',
                },
                tssn: {
                    required: '使用者身份證不得為空白',
                    tssn: '身份證ID格式有誤',
                },
                birthday: {
                    required: '生日不得為空白',
                },
                mobile: {
                    required: '手機號碼不得為空白',
                    checkphone: '手機號碼格式有誤',
                },
                address: {
                    required: '地址不得為空白',
                },
                myTown: {
                    checkMyTown: '需選擇郵遞區號',
                },
                recaptcha: {
                    required: '驗證碼不得為空白',
                    equalTo: '驗證碼需相同',
                },
            },
        });
        //end of 驗證欄位

        //upload img start
        // 取得元素ID
        function getId(el) {
            return document.getElementById(el);
        }
        // 圖示上傳處理，不接受中文檔名
        $("#uploadForm").click(function (e) {
            var fileName = $('#fileToUpload').val();
            var idxDot = fileName.lastIndexOf(".") + 1;
            let extFile = fileName.substr(idxDot, fileName.length).toLowerCase();//轉成小寫的副檔名
            if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
                $('#progress-div01').css("display", "flex");
                let file1 = getId("fileToUpload").files[0];
                let formdata = new FormData();
                formdata.append("file1", file1);
                let ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "file_upload_parser.php");
                ajax.send(formdata);
                return false
            } else {
                alert('目前只支援jpg,jpeg,png,gif檔案格式上傳');
            }
        });
        // 上傳過程顯示百分比
        function progressHandler(event) {
            let percent = Math.round((event.loaded / event.total) * 100)
            $("#progress-bar01").css("width", percent + "%")
            $("#progress-bar01").html(percent + "%")
        }
        // 上傳完成處理顯示圖片
        function completeHandler() {
            let data = JSON.parse(event.target.responseText)
            if (data.success == 'true') {
                $('#uploadname').val(data.fileName)
                $('#showimg').attr({
                    'src': 'uploads/' + data.fileName,
                    'style': 'display:block;'
                })
                $('button.btn.btn-danger').attr({
                    'style': 'display:none;'
                })
            } else {
                alert(data.error)
            }
        }
        function errorHandler(event) {
            alter('Upload Failed:上傳發生錯誤');
        }
        function abortHandler(event) {
            alter('Upload Aborted:上傳作業取消');
        }
        //end of img upload

        function getCaptcha() {
            var inputTxt = document.getElementById("captcha");
            // can為canvas的ID名稱
            // 150=影像寬，50=影像高，blue=影像背景顏色
            // white= text color, 28px= text size, 5=認證碼長度
            inputTxt.value = captchaCode("can", 150, 50, "blue", "white", "28px", 5);
        }


        $(function () {
            // 啟動認證碼功能
            getCaptcha();

            // 取得縣市代碼後查鄉鎮市的名稱
            $("#myCity").change(function () {
                var CNo = $('#myCity').val();
                if (CNo == "") {
                    return false;
                }
                $.ajax({
                    url: 'town_ajax.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        CNo: CNo,
                    },
                    success: function (data) {
                        if (data.c == true) {
                            $('#myTown').html(data.m);
                            $('#myZip').val("");
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function (data) {
                        alert("系統目前無法連接到後台資料庫");
                    }
                });
            });
            //end 取得縣市代碼

            // 取得鄉鎮市代碼，查詢郵遞區號放入#myZip,#zipcode
            $("#myTown").change(function () {
                var AutoNo = $('#myTown').val();
                if (AutoNo == "") {
                    return false;
                }
                $.ajax({
                    url: 'zip_ajax.php',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        AutoNo: AutoNo,
                    },
                    success: function (data) {
                        if (data.c == true) {
                            $('#myZip').val(data.Post);
                            $('#zipcode').html(data.Post + data.Cityname + data.Name);
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function (data) {
                        alert("系統目前無法連接到後台資料庫");
                    }
                });
            });
            // end 取得鄉鎮市代碼
        });
    </script>
</body>

</html>