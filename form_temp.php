<?php
require_once './php/config.php';
require_once './php/mysql_link.php';
session_start();
// 是否已登录
if (!isset($_SESSION['admin'])) {
    Header("Location:/index.php");
}


if ($_GET['formname'] === "maininfo" || $_GET['formname'] === "secondaryinfo-text") {
    $link = connectDb('content');
} else {
    $link = connectDb('formcontent');
}
if (@$_GET['change']) {
    $query = "select * from `" . $_GET['formname'] . "` where `id`=" . $_GET['id'] . " limit 1";
    if (mysqli_fetch_row(execute($link, $query))) {
        $query = "UPDATE `" . $_GET['formname'] . "` SET `职务` = '" . $_GET['职务'] . "', `姓名` ='" . $_GET['姓名'] . "' where `id`=" . $_GET['id'] . " limit 1";
    } else {
        $query = "INSERT INTO `" . $_GET['formname'] . "` (`id`, `职务`, `姓名`) VALUES ('" . $_GET['id'] . "', '" . $_GET['职务'] . "', '" . $_GET['姓名'] . "')";
    }
} else if (@$_GET['delete']) {
    $query = "DELETE FROM `" . $_GET['formname'] . "` where `id`=" . $_GET['id'] . " limit 1";
} else if (@$_GET['tchange']) {
    if ($_GET['formname'] === "secondary-text")
        $query = "UPDATE `" . $_GET['formname'] . "` SET `" . $_GET['colname'] . "` = '" . $_GET['textinner'] . "'  where `protitle`='" . $_GET['protitle'] . "' and `ind`=" . $_GET['ind'] . " limit 1";
    else {
        $query = "UPDATE `$_GET[formname]` SET `" . $_GET['colname'] . "` = '" . $_GET['textinner'] . "'  where `title`='" . $_GET['protitle'] . "' and userid='" . $_SESSION['username'] . "'  limit 1";
    }
}
echo $query;
execute($link, $query);
// echo '<script>window.close()</script>';
