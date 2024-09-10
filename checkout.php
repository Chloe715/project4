<?php
//將資料庫，連線程式載入 
require_once "./connections/conn_db.php";
// 如果session沒有啟動，則啟動session功能，這是跨網頁變數存取
(!isset($_SESSION)) ? session_start() : "";
?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("./php_lib.php"); ?>
<!-- 建立強制使用者登入 -->
<?php if (!isset($_SESSION['login'])) {
    $sPath = "login.php?sPath=checkout";
    header(sprintf("Location: %s", $sPath));
} ?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <?php require_once("head.php"); ?>
    <style type="text/css">
        .table td,
        .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-bottom: none;
            border-top: 1px solid #dee2e6;
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
                    <?php
                    //取得收件者地址資料
                    $SQLstring = sprintf("SELECT *,city.Name AS ctName,town.Name AS toName FROM addbook,city,town WHERE emailid='%d' AND setdefault='1' AND addbook.myzip=town.Post AND town.AutoNo=city.AutoNo", $_SESSION['emailid']);
                    $addbook_rs = $link->query($SQLstring);
                    if ($addbook_rs && $addbook_rs->rowCount() != 0) {
                        $data = $addbook_rs->fetch();
                        $cname = $data['cname'];
                        $mobile = $data['mobile'];
                        $myzip = $data['myzip'];
                        $address = $data['address'];
                        $ctName = $data['ctName'];
                        $toName = $data['toName'];
                    } else {
                        $cname = "";
                        $mobile = "";
                        $myzip = "";
                        $address = "";
                        $ctName = "";
                        $toName = "";
                    } ?>
                    <p>
                    <h5 class="text-center">結帳頁面</h5>
                    </p>
                    <hr style="margin:0px 20px 50px 20px ;border:1px solid #99a7b7">




                    <div class="row justify-content-center">
                        <div class="card col-md-5">
                            <div class="card-header" style="color:#003e52;">
                                <i class="fas fa-truck fa-flip-horizontal me-1"></i>配送資訊
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">收件人資訊：</h5>
                                <p class="card-text">姓名：<?php echo $cname; ?></p>
                                <p class="card-text">電話：<?php echo $mobile; ?></p>
                                <p class="card-text">郵遞區號：<?php echo $myzip . $ctName . $toName; ?></p>
                                <p class="card-text">地址：<?php echo $address; ?></p>
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">選擇其他收件人</button>
                            </div>
                        </div>


                        <!-- 建立付款方式 -->
                        <div class="card col ms-3">
                            <div class="card-header" style="color:#000;"><i
                                    class="fas a-truck fa-flip-horizontal me-1"></i>
                                付款方式
                            </div>
                            <div class="card-body pl-3 pt-2 pb-2">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home-tab-pane" type="button" role="tab"
                                            aria-controls="home-tab-pane" aria-selected="true"
                                            style="color:#007bff !important;font: size 14pt;">貨到付款</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false"
                                            style="color:#007bff !important;font: size 14pt;">信用卡</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact-tab-pane" type="button" role="tab"
                                            aria-controls="contact-tab-pane" aria-selected="false"
                                            style="color:#007bff !important;font: size 14pt;">銀行轉帳</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="epay-tab" data-bs-toggle="tab"
                                            data-bs-target="#epay" type="button" role="tab" aria-controls="epay"
                                            aria-selected="false"
                                            style="color:#007bff !important;font: size 14pt;">電子支付</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                        aria-labelledby="home-tab" tabindex="0">
                                        <h5 class="card-title pt-3">收件人資訊：</h5>
                                        <p class="card-text">姓名：<?php echo $cname; ?></p>
                                        <p class="card-text">電話：<?php echo $mobile; ?></p>
                                        <p class="card-text">郵遞區號：<?php echo $myzip . $ctName . $toName; ?></p>
                                        <p class="card-text">地址：<?php echo $address; ?></p>
                                    </div>
                                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                        aria-labelledby="profile-tab" tabindex="0">
                                        <table class="table caption-top">
                                            <caption>選擇貨到付款</caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="5%">#</th>
                                                    <th scope="col" width="35%">信用卡系統</th>
                                                    <th scope="col" width="30%">發卡銀行</th>
                                                    <th scope="col" width="30%">信用卡號</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><input type="radio" name="creditCard"
                                                            id="creditCard[]" checked></th>
                                                    <td><img src="./images/Visa_Inc._logo.svg" alt="visa"
                                                            class="img-fluid"></td>
                                                    <td>玉山商業銀行</td>
                                                    <td>1234 ****</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><input type="radio" name="creditCard"
                                                            id="creditCard[]" checked></th>
                                                    <td><img src="./images/MasterCard_logo.svg" alt="master"
                                                            class="img-fluid"></td>
                                                    <td>玉山商業銀行</td>
                                                    <td>1234 ****</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><input type="radio" name="creditCard"
                                                            id="creditCard[]" checked></th>
                                                    <td><img src="./images/UnionPay_logo.svg" alt="unionpay"
                                                            class="img-fluid"></td>
                                                    <td>玉山商業銀行</td>
                                                    <td>1234 ****</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <button type="button" class="btn btn-outline-success">使用其它信用卡付款</button>
                                    </div>
                                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel"
                                        aria-labelledby="contact-tab" tabindex="0">ATM匯款資訊收信人資訊：
                                        <h4 class="card-title">ATM匯款資訊：</h4>
                                        <img src="./images/Cathay-bk-rgb-db.svg" alt="cathay" class="img-fluid">
                                        <h5 class="card-title">匯款銀行：國泰世華銀行 銀行代碼：013</h5>
                                        <h5 class="card-title">姓名：林小強</h5>
                                        <p class="card-text">匯款帳號：1234-4567-7890-1234</p>
                                        <p class="card-text">備註：匯款完成後，需要1、2個工作天，待系統入款完成後，將以簡訊通知訂單完成付款。</p>

                                    </div>
                                    <div class="tab-pane fade" id="epay" role="tabpanel" aria-labelledby="epay-tab"
                                        tabindex="0">
                                        <table class="table caption-top">
                                            <caption>選擇電子支付方式</caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="5%">#</th>
                                                    <th scope="col" width="35%">電子支付系統</th>
                                                    <th scope="col" width="60%">電子支付系統</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><input type="radio" name="epay[]" id="epay[]"
                                                            checked></th>
                                                    <td><img src="./images/Apple_Pay_logo.svg" alt="applepay"
                                                            calss="img-fluid"></td>
                                                    <td>Apple Pay</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><input type="radio" name="epay[]" id="epay[]"
                                                            checked></th>
                                                    <td><img src="./images/Line_Pay_logo.svg" alt="linePay"
                                                            calss="img-fluid"></td>
                                                    <td>Line Pay</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><input type="radio" name="epay[]" id="epay[]"
                                                            checked></th>
                                                    <td><img src="./images/JKOPAY_logo.svg" alt="jkopay"
                                                            calss="img-fluid"></td>
                                                    <td>JKOPAY</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center" style="margin-top:80px">
                        <div class="table-responsive-md col-md-11">
                            <?php
                            //建立購物車資料查詢
                            
                            $SQLstring = "SELECT * FROM cart,product,product_img WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "' AND orderid IS NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
                            $cart_rs = $link->query($SQLstring);
                            $ptotal = 0;//設定累加的變數，初始=0;
                            ?>
                            <table class="table table-hover mt-3 text-center">
                                <thead>
                                    <tr class="text-bg-light">
                                        <td width="10%">產品編號</td>
                                        <td width="10%">圖片</td>
                                        <td width="30%">名稱</td>
                                        <td width="15%">價格</td>
                                        <td width="15%">數量</td>
                                        <td width="20%">小計</td>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php while ($cart_data = $cart_rs->fetch()) { ?>

                                        <tr>
                                            <td><?php echo $cart_data['p_id']; ?></td>
                                            <td>
                                                <img src="images1/<?php echo $cart_data['img_file']; ?>"
                                                    alt="<?php echo $cart_data['p_name']; ?>" class="img-fluid">
                                            </td>
                                            <td><?php echo $cart_data['p_name']; ?></td>
                                            <td>
                                                <h6 class="color_e600a0 pt-1">$<?php echo $cart_data['p_price']; ?></h6>
                                            </td>
                                            <td style="min-width:100px" class="text-center">
                                                <?php echo $cart_data['qty']; ?>

                                            </td>
                                            <td>$<?php echo $cart_data['p_price'] * $cart_data['qty']; ?></td>
                                        </tr>
                                        <?php $ptotal += $cart_data['p_price'] * $cart_data['qty'];
                                    } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="7">累計：<?php echo $ptotal; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">運費：100</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="color_red">總計：<?php echo $ptotal + 100; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <button type="button" id="btn05" name="btn05"
                                                class="btn btn-outline-secondary" style="margin:50px 0"
                                                onclick="window.history.go(-1);">回上一頁</button>
                                            <button type="button" id="btn04" name="btn04" class="btn btn-dark"
                                                style="margin:50px 0">確認結帳</button>

                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
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


    <!-- Modal -->
    <?php
    //取得所有收件人資料
    $SQLstring = sprintf("SELECT *,city.Name AS ctName,town.Name AS toName FROM addbook,city,town WHERE emailid='%d' AND addbook.myzip=town.Post AND town.AutoNo=city.AutoNo", $_SESSION['emailid']);
    $addbook_rs = $link->query($SQLstring);
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">收件人資訊</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="cname" id="cname" class="form-control" placeholder="收件者姓名">
                            </div>
                            <div class="col">
                                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="收件者電話">
                            </div>
                            <div class="col">
                                <select name="myCity" id="myCity" class="form-control">
                                    <option value="">請選擇市區</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="myTown" id="myTown" class="form-control">
                                    <option value="">請選擇地區</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <input type="hidden" name="myZip" id="myZip" value="">
                                <label for="address" id="add_label" name="add_label">郵遞區號：</label>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-auto">
                                <button type="button" class="btn btn-success" id="recipient"
                                    name="recipient">新增收件人</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">收件人姓名</th>
                                <th scope="col">電話</th>
                                <th scope="col">地址</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = $addbook_rs->fetch()) { ?>

                                <tr>
                                    <th scope="row"><input type="radio" name="gridRadios" id="gridRadios[]"
                                            value="<?php echo $data['addressid'] ?>" <?php echo ($data['setdefault']) ? 'checked' : ''; ?>></th>
                                    <td><?php echo $data['cname']; ?></td>
                                    <td><?php echo $data['mobile']; ?></td>
                                    <td><?php echo $data['myzip'] . $data['ctName'] . $data['toName'] . $data['address']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">關閉Close</button>

                </div>
            </div>
        </div>
    </div>


</body>

</html>