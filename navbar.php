<div class="fixed-top navbar-container">
    <div class="run">
        <!-- <marquee behavior="" direction=""></marquee> -->
        單筆訂單滿$1500元免運費，最低消費金額$100元。
    </div>
    <nav class="navbar navbar-expand-lg bg">
        <!-- fixed-top -->


        <div class="container-fluid ">
            <a class="navbar-brand" href="index.php">PONG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding-left:90px">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">首頁</a>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            全部商品
                        </a>

                        <ul class="dropdown-menu">
                            <?php
                            //讀取後台購物車內產品數量
                            $SQLstring = "SELECT * FROM cart WHERE orderid is NULL AND ip='" . $_SERVER['REMOTE_ADDR'] . "'";
                            $cart_rs = $link->query($SQLstring);
                            ?>
                            <?php
                            // 列出產品類別第一層
                            $SQLstring = "SELECT * FROM pyclass WHERE level=2 ORDER BY sort";
                            $pyclass01 = $link->query($SQLstring);
                            $i = 1;
                            ?>
                            <?php while ($pyclass01_Rows = $pyclass01->fetch()) { ?>
                                <li><a class="dropdown-item"
                                        href="con1.php?classid=<?php echo $pyclass01_Rows['classid']; ?>"><?php echo $pyclass01_Rows['cname']; ?></a>
                                </li><?php $i++;
                            } ?>
                        </ul>

                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                </ul>
            </div>
            <div class="icon navbar-nav" style="width:130px">
                <!-- 會員登出登入為一組設定 -->
                <?php if(isset($_SESSION['login'])) {?>
                <li class="nav-item">
                    <a class="nav-link loginout-button" href="javascript:void(0);" onclick="btn_confirmLink('是否確定登出？','logout.php')" >登出</a>
                </li>
                <?php } else { ?>
                <li class="nav-item loginout-button">
                    <a class="nav-link" href="login.php">登入</a>
                </li>
                <?php } ?>
                <a href="cart.php">
                    <i class="fa-solid fa-cart-shopping fa-2x" style="color: #003e52;"></i>
                    <span class="position-absolute top-5 start-85 translate-middle badge rounded-pill bg-danger">
                        <?php echo ($cart_rs) ? $cart_rs->rowCount() : ''; ?>
                    </span>

                </a>
            </div>
        </div>
    </nav>
</div>