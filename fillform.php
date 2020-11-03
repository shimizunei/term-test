<?php
require_once './php/config.php';
require_once './php/mysql_link.php';
session_start();
// 如果未登录
if (!isset($_SESSION['admin'])) {
    Header("Location:/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username'].$_GET['formname'];?></title>
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/css/fiiform.css">
</head>

<body>
    <!-- 头部 -->
    <div class="header">
        <div class="title"><a href="#">基层社区防灾减灾一掌通</a></div>
        <div class="name">
            <?php
            // 设置name
            echo $_GET['formname'];
            ?>
        </div>
        <div class="out">
            <a href=""><i></i><h4>退出</h4></a>
        </div>
    </div>
    <!-- 索引栏 -->
    <div class="index">

    </div>
    <!-- 进度条 -->
    <div class="progressbar">
    </div>
    <!-- 主体 -->
    <div class="mbody">
        <div class="title">
            <?php
                // 连接数据库
                $link = connectDb('content');
                $query="select * from maininfo where title='$_GET[formname]' limit 1";
                $result = execute($link, $query);
                $arr = mysqli_fetch_row($result);
                echo $_SESSION['username'].$_GET['formname'];
            ?>
        </div>
        <div class="contain">
            <?php
                if($arr[1])
                echo "$arr[1]"
            ?>
        </div>
    </div>
    <!-- 提交按钮 -->
    <div class="submit">
        <h4>提交</h4>
    </div>
</body>