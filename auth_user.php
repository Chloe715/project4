<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type：application/json;charset=utf-8');
// 會員帳號密碼驗證
(!isset($_SESSION)) ? session_start() : "";
require_once('./Connections/conn_db.php');
if (isset($_POST['inputAccount']) && isset($_POST['inputPassword'])) {
    $inputAccount = $_POST['inputAccount'];
    $inputPassword = $_POST['inputPassword'];
    // 查詢是否有此帳密
    $query = sprintf("SELECT * FROM member WHERE email='%s' AND pw1='%s'", $inputAccount, $inputPassword);
    $result = $link->query($query);
    if ($result) {
        if ($result->rowCount() == 1) {
            $data = $result->fetch();
            if ($data['active']) {
                $_SESSION['login'] = true;
                $_SESSION['emailid'] = $data['emailid'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['cname'] = $data['cname'];
                $retcode = array("c" => "1", "m" => '會員驗證成功。');
            } else {
                $retcode = array("c" => "2", "m" => '會員帳號被鎖定，請聯絡管理人員。');
            }
        } else {
            $retcode = array("c" => "2", "m" => '帳號密碼錯誤，請重新輸入。');
        }
    } else {
        $retcode = array("c" => "0", "m" => '抱歉！會員驗證失敗，請聯絡管理人員。');
    }
 //echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
    //JSON_UNESCAPED_UNICODE 选项是在 PHP 5.4.0 中引入的，如果你的 PHP 版本低于这个版本，請用如下的方式修正
    echo json_encode($retcode);
}
return;
