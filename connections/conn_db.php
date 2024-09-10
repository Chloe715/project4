<?php
$dsn="mysql:host=localhost;dbname=expstore;charset=utf8";
$user="root";
$password="123456";
$link=new PDO($dsn,$user,$password);
$link->query("set names utf8");
date_default_timezone_set("Asia/Taipei");

?>