<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./navdev.js"></script>

<script type="text/javascript" src="fancybox-2.1.7/source/jquery.fancybox.js"></script>

<script type="text/javascript">
    $(function () {
        //定義在滑鼠滑過圖片檔名填入主圖src中
        $(".card .row.mt-2 .col-md-4 a").mouseover(function () {
            var imgsrc = $(this).children("img").attr("src");
            $("#showGoods").attr({ "src": imgsrc });
        });
        //將子圖片放到lightbox展示
        $(".fancybox").fancybox();
    });
</script>

<script>
    //將產品p_id加入購物車
    function addcart(p_id) {
        var qty = $("#qty").val();
        if (qty <= 0) {
            alert("產品數量不得為0或為負數！");
            return (false);
        }
        if (qty == undefined) {
            qty = 1;
        } else if (qty >= 50) {
            alert("由於採購限制，數量最多50件。");
            return (false);
        }
        //利用jquery $.ajax函數呼叫後台的addcart.php
        $.ajax({
            url: 'addcart.php',
            type: 'get',
            dataType: 'json',
            data: { p_id: p_id, qty: qty, },
            success: function (data) {
                if (data.c == true) {
                    alert(data.m);
                    window.location.reload();
                } else {
                    alert(data.m);
                }
            },
            error: function (data) {
                alert("系統目前無法連線到後台資料庫。");
            }
        });
    }
</script>
<script type="text/javascript">
    //跳出確認訊息對話框
    function btn_confirmLink(message, url) {
        if (message == "" || url == "") {
            return false;
        }
        if (confirm(message)) {
            window.location = url;
        }
        return false;
    }

</script>