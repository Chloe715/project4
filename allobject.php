<?php
//建立product藥妝商品RS
$maxRows_rs = 4; //分頁設定數量
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
<?php while ($pList01_Rows = $pList01->fetch()) { ?>
    <?php if ($i % 4 == 1) { ?>
        <div class="row  content-center text-center">
        <?php } ?>

        <div class="card col-md-3" style="width: 20rem; margin:1rem">
            <img src="./images1/<?php echo $pList01_Rows['img_file']; ?>" class="card-img-top hot-img  transition"
                alt="<?php echo $pList01_Rows['p_name']; ?>" title="<?php echo $pList01_Rows['p_name']; ?>">

            <div class="card-body">
                <h5 class="card-title"><?php echo $pList01_Rows['p_name']; ?></h5>
                <h6 style="color:#6b6b6b"><?php echo mb_substr($pList01_Rows['p_intro'], 0, 30, "utf-8"); ?></h6>
                <br><br>
                <p class="card-text font-siz">NT <?php echo $pList01_Rows['p_price']; ?></p><br>
                <a href="#" class="btn btn-light"><i class="fa-solid fa-cart-shopping fa-lg"
                        style="color: #003e52;"></i></a>
            </div>
        </div>
        <?php if ($i % 4 == 0 || $i == $pList01->rowCount()) { ?>
        </div><?php } ?>
    <?php $i++;
} ?>

</div>
<br>
<div class="content-center">
    <?php  //取得目前頁數
    if (isset($_GET['totalRows_rs'])) {
        $totalRows_rs = $_GET['totalRows_rs'];
    } else {
        $all_rs = $link->query($queryFirst);
        $totalRows_rs = $all_rs->rowCount();
    }
    $totalPages_rs = ceil($totalRows_rs / $maxRows_rs) - 1;
    // 呼叫分頁功能函數
    $prev_rs = "&laquo;";
    $next_rs = "&raquo;";
    $separator = "|";
    $max_links = 20;
    $pages_rs = buildNavigation($pageNum_rs, $totalPages_rs, $prev_rs, $next_rs, $separator, $max_links, true, 3, "rs");
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php echo $pages_rs[0] . $pages_rs[1] . $pages_rs[2]; ?>

        </ul>
    </nav>
</div>