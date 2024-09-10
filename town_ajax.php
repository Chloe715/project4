<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type：application/json;charset=utf-8');

require_once('./Connections/conn_db.php');

$Town=sprintf("SELECT * from town where AutoNo='%d'",$_POST["CNo"]);
$Town_rs=$link->query($Town);
$Town_num=$Town_rs->rowCount();
$htmlstring="<option value=''>選擇鄉鎮市</option> ";
if($Town_num>0){
    while($Town_rows=$Town_rs->fetch()){
        $htmlstring=$htmlstring."<option value='".$Town_rows['townNo']."'>".$Town_rows["Name"]."</option>" ;
    }
    $retcode=array("c"=>"1", "m" =>$htmlstring);
}else{
    $retcode=array("c"=>"0", "m" =>'找不到相關資料');
}

    //echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
    //JSON_UNESCAPED_UNICODE 选项是在 PHP 5.4.0 中引入的，如果你的 PHP 版本低于这个版本，請用如下的方式修正
    echo json_encode($retcode);
return;
?>
