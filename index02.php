<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>麵包web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="./website02.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK:wght@100..900&display=swap" rel="stylesheet">

</head>



<body>
    <div class="run">
        <!-- <marquee behavior="" direction=""></marquee> -->
        單筆訂單滿$1500元免運費，最低消費金額$100元。
    </div>



    <section id="header">

        <nav class="navbar navbar-expand-lg bg">
            <!-- fixed-top -->
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">PONG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">首頁</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                全部商品
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">法式甜點</a></li>
                                <li><a class="dropdown-item" href="#">歐式派塔</a></li>
                                <li><a class="dropdown-item" href="#">可頌</a></li>
                                <li><a class="dropdown-item" href="#">麵包</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FAQ</a>
                        </li>



                    </ul>
                </div>
                <div class="icon navbar-nav">
                    <a href="#"><i class="fa-solid fa-cart-shopping fa-lg" style="color: #003e52;"></i></a>
                </div>
            </div>
        </nav>
    </section>


    <section id="contentA">
        <div id="carouselExampleIndicators" class="carousel slide carousel-container" data-bs-ride="true">
            <div class="carousel-indicators ">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/大圖2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/大圖1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/大圖3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>



    <section id="contentB">
        <div class="content-img">
            <img src="./images/說明.PNG" alt="Description" class="img1">
        </div>

        <div class="row content-center text-center">

            <div class="card col-md-3 transition" style="width: 20rem; margin:1rem">
                <a href="#"><img src="./images/國王派首圖.jpg" class="card-img-top" style="padding:10px"></a>
                <div class="card-body">
                    <p class="card-text" style="font-size:1.2rem">
                        歐式派塔
                    </p>
                </div>
            </div>

            <div class="card col-md-3 transition" style="width: 20rem; margin:1rem">
                <img src="./images/法式甜點首圖.jpg" class="card-img-top" style="padding:10px">
                <div class="card-body">
                    <p class="card-text" style="font-size:1.2rem">法式甜點</p>
                </div>
            </div>

            <div class="card col-md-3 transition" style="width: 20rem; margin:1rem">
                <img src="./images/可頌首圖.jpg" class="card-img-top" style="padding:10px">
                <div class="card-body">
                    <p class="card-text" style="font-size:1.2rem">可頌</p>
                </div>
            </div>

            <div class="card col-md-3 transition" style="width: 20rem; margin:1rem">
                <img src="./images/麵包首圖.jpg" class="card-img-top" style="padding:10px">
                <div class="card-body">
                    <p class="card-text" style="font-size:1.2rem">麵包</p>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br>

        <h3 class="content-center">熱賣商品</h3>
        <br><br>
        <div class="row  content-center text-center">

            <div class="card col-md-3" style="width: 20rem; margin:1rem">
                <img src="./images1/巧克力甘納許.PNG" class="card-img-top hot-img  transition">
                <div class="card-body">
                    <h5 class="card-title">巧克力甘納許</h5>
                    <h6 style="color:#6b6b6b">Chocolate Ganache Tart</h6>
                    <br><br>
                    <p class="card-text font-siz">NT 230</p><br>
                    <a href="#" class="btn btn-light"><i class="fa-solid fa-cart-shopping fa-lg"
                            style="color: #003e52;"></i></a>
                </div>
            </div>

            <div class="card col-md-3" style="width: 20rem; margin:1rem">
                <img src="./images1/可頌馬芬.PNG" class="card-img-top hot-img transition">
                <div class="card-body">
                    <h5 class="card-title">可頌馬芬</h5>
                    <h6 style="color:#6b6b6b">Cruffin</h6>
                    <br><br>
                    <p class="card-text font-siz">NT 110</p><br>
                    <a href="#" class="btn btn-light"><i class="fa-solid fa-cart-shopping fa-lg"
                            style="color: #003e52;"></i></a>
                </div>
            </div>

            <div class="card col-md-3 " style="width: 20rem; margin:1rem">
                <img src="./images1/巧克力香蕉奶油派.PNG" class="card-img-top hot-img transition">
                <div class="card-body">
                    <h5 class="card-title">香蕉奶油派</h5>
                    <h6 style="color:#6b6b6b">Banana cream pie</h6>
                    <br><br>
                    <p class="card-text font-siz">NT 220</p><br>
                    <a href="#" class="btn btn-light"><i class="fa-solid fa-cart-shopping fa-lg"
                            style="color: #003e52;"></i></a>
                </div>
            </div>

            <div class="card col-md-3 " style="width: 20rem; margin:1rem">
                <img src="./images1/紫蘇無花果酸麵包.PNG" class="card-img-top hot-img transition">
                <div class="card-body">
                    <h5 class="card-title">紫蘇無花果酸麵包</h5>
                    <h6 style="color:#6b6b6b"> Shiso & Fig Sourdough</h6>
                    <br><br>
                    <p class="card-text font-siz">NT 215</p><br>
                    <a href="#" class="btn btn-light"><i class="fa-solid fa-cart-shopping fa-lg"
                            style="color: #003e52;"></i></a>
                </div>
            </div>
        </div>
        <br>
        <div class="content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="content-img">
            <img src="./images/門市地址.PNG" alt="Description" class="img1">
        </div>
    </section>


    <section id="footer">

        <div class="container-fluid">
            <div id="aboutme" class="row text-center">

                <div class="col-md-3">



                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.861694220934!2d121.55397871173939!3d25.038767277720716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abc629e46fe3%3A0x6bb675075eddd13e!2zMTA25Y-w5YyX5biC5aSn5a6J5Y2A5YWJ5b6p5Y2X6LevMzA45be3MjHomZ8!5e0!3m2!1szh-TW!2stw!4v1723010059131!5m2!1szh-TW!2stw"
                        width="250" height="200" style="border: 2px solid #ffffff; 
      border-radius:2px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

                <div class="col-md-3" style="padding-top:30px;line-height:30px;font-weight: 200;">
                    ABOUT US <br>
                    <hr>
                    關於我們<br>
                    FAQ<br>
                </div>

                <div class="col-md-3" style="padding-top:30px;line-height:30px;font-weight: 200;">
                    CONTACT US <br>
                    <hr>
                    客服時間:10:00-21:00<br>
                    地址:台北市大安區光復南路308巷21號<br>
                    信箱:info@purebread.com.tw<br>
                    <br>
                </div>

                <div class="col-md-3" style="padding-top:150px;">
                    <i class="fa-brands fa-line fa-2xl" style="color: #ffffff;padding:0 6px"></i>
                    <i class="fa-brands fa-facebook fa-2xl " style="color: #ffffff; padding:0 6px"></i>
                    <i class="fa-brands fa-instagram fa-2xl " style="color: #ffffff;padding:0 6px"></i>
                    <i class="fa-brands fa-youtube fa-2xl" style="color: #ffffff;padding:0 6px"></i>
                </div>



            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




</body>

</html>