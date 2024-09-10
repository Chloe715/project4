<?php
//建立購物車資料查詢

$SQLstring = "SELECT * FROM cart,product,product_img WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "' AND orderid IS NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
$cart_rs = $link->query($SQLstring);
$ptotal = 0;//設定累加的變數，初始=0;
?>


<p>
<h5 class="text-center">購物車</h5>
</p>
<hr style="margin:0px 20px 50px 20px ;border:1px solid #99a7b7">


<div class="table-responsive-md">
    <table class="table table-hover mt-3">
        <thead>
            <tr class="table-light text-center">
                <td width="10%">產品編號</td>
                <td width="10%">圖片</td>
                <td width="25%">名稱</td>
                <td width="15%">價格</td>
                <td width="10%">數量</td>
                <td width="15%">小計</td>
                <td width="15%">下次再買</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($cart_data = $cart_rs->fetch()) { ?>
                <tr class="text-center">
                    <td><?php echo $cart_data['p_id']; ?></td>
                    <td>
                        <img src="images1/<?php echo $cart_data['img_file']; ?>"
                            alt="<?php echo $cart_data['p_name']; ?>" class="img-fluid">
                    </td>
                    <td><?php echo $cart_data['p_name']; ?></td>
                    <td>
                        <h6 class="color_e600a0 pt-1"><?php echo $cart_data['p_price']; ?></h6>
                    </td>
                    <td style="min-width:100px">
                        <div class="input-group">
                            <input type="number" class="form-control" id="qty[]" name="qty[]"
                                value="<?php echo $cart_data['qty']; ?>" min="1" max="20"
                                cartid="<?php echo $cart_data['cartid']; ?>" required style="min-width:60px">
                        </div>
                    </td>

                    <td>$<?php echo $cart_data['p_price'] * $cart_data['qty']; ?></td>
                    <td><button type="button" id="btn[]" name="btn[]" class="btn btn-secondary btn-sm" onclick="btn_confirmLink('確定刪除本資料?','shopcart_del.php?mode=1&cartid=<?php echo $cart_data['cartid']; ?>')">取消</button>
                    </td>
                </tr>
                <?php $ptotal += $cart_data['p_price'] * $cart_data['qty'];
            } ?>
        </tbody>
        <tfoot class="text-center">
            <tr>
                <td colspan="7">累計：<?php echo $ptotal; ?></td>
            </tr>
            <tr>
                <td colspan="7">運費：100</td>
            </tr>
            <tr>
                <td colspan="7" class="color_red">總計：<?php echo $ptotal + 100; ?></td>
            </tr>
        </tfoot>
    </table>

    

    <div class="text-center" style="margin:50px 0">
        <?php if ($cart_rs->rowCount() != 0) { ?>
            <a href="con1.php" id="btn01" name="btn01" class="btn cart-color">繼續購物</a>
            <button type="button" id="btn03" name="btn03" class="btn cart-color"
                onclick="btn_confirmLink('確定清除購物車？','shopcart_del.php?mode=2');">清空購物車</button>
            <a href="#" class="btn btn-warning">結帳(未開啟)</a>
    </div>

    </div>
    

<?php } else { ?>
    <div class="alert alert-warning" role="alert">抱歉！目前購物車沒有相關產品</div>
<?php } ?>