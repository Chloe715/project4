<div class="col-md-2" style="border-right:1px solid #e4e4e4;margin-top:100px">
    <section id="sidebar">
        <div class="sidebar">

            <?php

            $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
            $pyclass01 = $link->query($SQLstring);
            $i = 1;  // 控制編號順序
            ?>

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <?php while ($pyclass01_Rows = $pyclass01->fetch()) {
                    $i = $pyclass01_Rows['classid']; ?>
                    <div class="accordion-item text-center">

                        <h2 class="accordion-header no-arrow" id="flush-headingOne<?php echo $i; ?>">
                            <button class="accordion-button <?php echo ($i == 1 || $i == 3) ? 'no-arrow' : 'collapsed'; ?>"
                                type="button" <?php echo ($i == 2) ? 'data-bs-toggle="collapse" data-bs-target="#flush-collapseOne' . $i . '" aria-expanded="false" aria-controls="flush-collapseOne' . $i . '"' : ''; ?>>
                                <?php if ($i == 1) { ?>
                                    <a href="index.php" class="text"><?php echo $pyclass01_Rows['cname']; ?></a>
                                <?php } else { ?>
                                    <?php echo $pyclass01_Rows['cname']; ?>
                                <?php } ?>
                            </button>
                        </h2>

                        <?php if ($i == 2) {
                            if (isset($_GET['p_id'])) { //如果使用產品查詢，需取得類別編號上一層類別
                                $SQLstring = sprintf("SELECT uplink FROM pyclass,product WHERE pyclass.classid=product.classid AND p_id=%d", $_GET['p_id']);
                                $classid_rs = $link->query($SQLstring);
                                $data = $classid_rs->fetch();
                                $ladder = $data['uplink'];
                                // 列出產品類別第一層
                            } elseif (isset($_GET['level']) && $_GET['level'] == 1) {
                                $ladder = $_GET['classid'];
                            } elseif (isset($_GET['classid'])) { //如果使用類別查詢需取得上一層類別
                                $SQLstring = "SELECT uplink FROM pyclass where level=2 and classid=" . $_GET['classid'];
                                $classid_rs = $link->query($SQLstring);
                                $data = $classid_rs->fetch();
                                $ladder = $data['uplink'];
                            } else {
                                $ladder = 1;
                            }
                            //列出產品類別對應的第二層資料
                            $SQLstring = sprintf(
                                "SELECT * FROM pyclass WHERE level=2 AND uplink=%d ORDER BY sort",
                                $pyclass01_Rows['classid']
                            );
                            $pyclass02 = $link->query($SQLstring);
                            ?>
                        </div>

                        <div class="accordion-item">



                            <div id="flush-collapseOne<?php echo $i; ?>"
                                class="accordion-collapse collapse <?php echo ($i == $ladder) ? 'show' : ''; ?>"
                                aria-labelledby="flush-headingOne<?php echo $i; ?>" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p><a href="con1.php" class="text">全部商品</a></p>
                                    <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                                        <p>
                                            <a href="con1.php?classid=<?php echo $pyclass02_Rows['classid']; ?>"
                                                class="text"><?php echo $pyclass02_Rows['cname']; ?>
                                            </a>
                                        </p>


                                    <?php } ?>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <?php $i++;
                } ?>
            </div>
        </div>
    </section>
</div>