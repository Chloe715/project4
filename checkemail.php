<?php
include_once("./connections/conn_db.php");
if(isset($_GET['email'])){
    $email=$_GET['email'];
    $query="SELECT emailid from member where email='".$email."'";
    $result=$link->query($query);
    $row=$result->rowCount();
    if($row==0){
        echo 'true';
        return;
    }
}
echo 'false';
return;
