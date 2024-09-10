<?php
//建立product藥妝商品RS
$maxRows_rs = 8; //分頁設定數量
$pageNum_rs = 0; //起啟頁=0
if (isset($_GET['pageNum_rs'])) {
    $pageNum_rs = $_GET['pageNum_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;

if (isset($_GET['classid'])) {
    //使用產品類別查詢
    $queryFirst = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid='%d' ORDER BY product.p_id DESC", $_GET['classid']);
} else {
    //列出產品product資料查詢
    $queryFirst = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id ORDER BY product.p_id DESC", $maxRows_rs);
}
$query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRow_rs, $maxRows_rs);
$pList01 = $link->query($query);

$i = 1;  //控制每列row產生
?>
<?php if ($pList01->rowCount() != 0) { ?>
    <?php while ($pList01_Rows = $pList01->fetch()) { ?>
        <?php if ($i % 4 == 1) { ?>
            <div class="row card-RWD">
            <?php } ?>
            <div class="card col-md-3  content-center text-center card-sty"><a
                    href="goods.php?p_id=<?php echo $pList01_Rows['p_id']; ?>">
                    <img src="./images1/<?php echo $pList01_Rows['img_file']; ?>" class="card-img-top hot-img transition"
                        alt="<?php echo $pList01_Rows['p_name']; ?>" title="<?php echo $pList01_Rows['p_name']; ?>"></a>


                <div class="card-body">
                    <h5 class="card-title"><?php echo $pList01_Rows['p_name']; ?></h5>
                    <h6 style="color:#6b6b6b">
                        <?php echo mb_substr($pList01_Rows['p_intro'], 0, 30, "utf-8"); ?>
                    </h6>
                    <br>
                    <p class="card-text font-siz">NT <?php echo $pList01_Rows['p_price']; ?></p><br>

                    <!-- <a href="#" class=""></a> -->
                    <button type="button" id="button01[]" name="button01[]" class="btn btn-light"
                        onclick="addcart(<?php echo $pList01_Rows['p_id']; ?>)"><i class="fa-solid fa-cart-shopping fa-lg"
                            style="color: #003e52;"></i></button>

                </div>
            </div>
            <?php if ($i % 4 == 0 || $i == $pList01->rowCount()) { ?>
            </div><?php } ?>
        <?php $i++;
    } ?>

<?php } else { ?>
    <div class="alert alert-light" role="alert">
        產品已售完。
    </div>
<?php } ?>