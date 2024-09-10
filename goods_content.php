<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4"  style="padding-left:18px">
            <?php
            //取得產品圖片檔名資料
            $SQLstring = sprintf("SELECT * FROM product_img WHERE product_img.p_id=%d ORDER BY sort", $_GET['p_id']);
            $img_rs = $link->query($SQLstring);
            $imgList = $img_rs->fetch();
            ?>
            <img id="showGoods" name="showGoods" src="./images1/<?php echo $imgList['img_file']; ?>"
                alt="<?php echo $data['p_name']; ?>" title="<?php echo $data['p_name']; ?>" class="img-fluid card-img "
                style="width:500px;height:370px">
            <div class="row mt-2 ss1">
                <?php do { ?>
                    <div class="col-md-4 "><a href="images1/<?php echo $imgList['img_file']; ?>" rel="group" class="fancybox "
                            title="<?php echo $data['p_name']; ?>">
                            <img src="images1/<?php echo $imgList['img_file']; ?>" alt="<?php echo $imgList['p_name']; ?>"
                                title="<?php echo $imgList['p_name']; ?>" class="img-fluid sbmar "></a>
                    </div>
                <?php } while ($imgList = $img_rs->fetch()); ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body" style="padding-left:50px">
                <h5 class="card-title"><?php echo $data['p_name']; ?></h5>
                <p class="card-text"><?php echo $data['p_intro']; ?></p>
                <br>
                <h4 class="price_color">NT <?php echo $data['p_price']; ?></h4>
                <br><br>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text color-success" id="inputGroup-sizing-lg">數量</span>
                            <input type="number" id="qty" name="qty" value="1" class="form-control"
                                aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <button name="button01" id="button01" type="button" class="btn btn-lg car_color butt"
                            onclick="addcart(<?php echo $data['p_id']; ?>)">加入購物車</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-text"  style="padding-left:18px">

            <hr style="border:1px solid #003e52;margin:20px 150px 50px 0px">
            <p class="content_font">商品介紹</p>
            <ul>

                <p>
                    <li>保存方式</li>
                </p>
                <p>常溫商品可保存 1~2日，如未食用完需密封包裝冷凍保存。</p>
                <p>可頌類：冷凍保存約 2週。</p>
                <p>麵包類：冷凍保存約 3週。</p>
                <p>甜點類：冷藏保存 3天。</p>
                <p>
                    <li>加熱方式</li>
                </p>
                <p>解凍 10~15分鐘後，在麵包上噴水，並以140~160度回烤5分鐘左右即可食用；可視烤箱效能差異自行調整加熱時間長短。</p>
            </ul>

            <div></div>
            <br>
            <p class="content_font">運送方式</p>
            <ul>

                <p>
                    <li>每筆訂單最低消費金額為 $100元，單筆訂單滿 $1500元免運費</li>
                </p>
                <p>
                    <li>商品製作需要2~3日，請務必配合選填自取/配送日期</li>
                </p>
                <p>門市自取：每日下午 3:00後</p>
                <p>
                    <li>常溫遞送：</li>
                </p>
                <p>限大台北地區。</p>
                <p>商品會在您下單時選擇的配送日當日寄出到貨。</p>
                <p>
                    <li>低溫宅配：</li>
                </p>
                <p>商品將會在您選擇的配送日當日寄出隔日到貨。</p>
                <p>宅配「法棍」為裝箱，視紙箱尺寸不切或對切。</p>
                <p>物流工作日將依黑貓官方公告為主。</p>

            </ul>
        </div>
    </div>
</div>
<?php echo $data['p_content']; ?>