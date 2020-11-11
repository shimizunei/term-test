<?php
require_once './php/config.php';
require_once './php/mysql_link.php';
session_start();
// 是否已登录
if (!isset($_SESSION['admin'])) {
    Header("Location:/index.php");
}
$link = connectDb('formcontent');
if(@$_GET['change']){
    $query = "UPDATE `".$_GET['formname']."` SET `职务` = '".$_GET['职务']."', `姓名` ='".$_GET['姓名']."' where `id`=".$_GET['id']." limit 1";   
}else if(@$_GET['delete']){
    $query="DELETE FROM `".$_GET['formname']."` where `id`=".$_GET['id']." limit 1";  
}
execute($link, $query);
echo '<script>window.close()</script>';
