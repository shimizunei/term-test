<?php
require_once './php/config.php';
require_once './php/mysql_link.php';
// 打开session
session_start();
// 判断是否登录
if (isset($_SESSION['admin'])) {
    Header("Location:/main.php");
}
// 操作登出
if (isset($_GET['logout'])) {
    session_start();
    unset($_SESSION['admin']);
    unset($_SESSION['username']);
    unset($_SESSION['userid']);
    Header("Location:/index.php");
}
// 如果没有登录
if (!isset($_SESSION['admin'])) {
    // 判断是否由sumbit提交
    if (isset($_POST['submit'])) {
        // 提取用户名和密码
        $username = htmlspecialchars($_POST['username']);
        $password = md5($_POST['password']);
        // 连接数据库
        $link = connectDb('users');
        $query = "select * from user where username='$username' limit 1";
        $result = execute($link, $query);
        // 用户名是否有记录
        if ($result->num_rows) {
            $query = "select * from user where username='$username' and password='$password' limit 1";
            $result = execute($link, $query);
            // 密码是否正确
            if ($result->num_rows) {
                // 提取记录为数组
                $arr = mysqli_fetch_assoc($result);
                // 设置session
                $_SESSION["admin"] = true;
                $_SESSION['username'] = $arr['namestring'];
                $_SESSION['userid'] = $arr['userid'];
                closeDb($link);
            } else {
                // 标记密码错误
                Header("Location:/index.php?userExist=true&passwordOk=false");
            }
        } else {
            // 标记用户名为不存在
            Header("Location:/index.php?userExist=false");
        }
    } else {
        die("请你善良");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=/main.php">
    <title>登陆中.....</title>
</head>

<body style=" text-align: center;">
    <h4>登录成功</h4>
    <p>3秒后自动跳转到主页</p>
    <p>如未成功跳转请点击<a href="/main.php">此处</a></p>
</body>

</html>