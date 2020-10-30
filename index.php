<?php
session_start();
// 是否已登录
if(isset($_SESSION['admin'])){
    Header("Location:/main.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>

    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/index.css">

    <script src="https://cdn.staticfile.org/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="/js/index.js"></script>

</head>
<body></body>
    <!-- 背景 -->
    <div class="bgimg"></div>
    <div class="login">
        <div class="box">
            <div class="header">基层社区防灾减灾一掌通</div>
            <div class="body">
                <form action="/login_temp.php" method="POST">
                    <div class="user">
                        <label for="user">用户名</label>
                        <input type="text" name="username" id="user" required="required" autocomplete="off">
                        <i class="clear"></i>
                    </div>
                    <div class="password">
                        <label for="password">密码</label>
                        <input type="password" name="password" id="password" required="required" autocomplete="off">
                        <i class="clear"></i>
                        <i class="d-n-swithch"></i>
                    </div>
                    <div class="code">
                        <input type="text" name="code" id="code" required="required" autocomplete="off" placeholder="请输入验证码">
                        <img src="./image_code.php" alt="">
                    </div>
                    <input type="submit" name="submit"id="submit" value="登录"  >
                </form>
            </div>
        </div>
    </div>
</body>
</html>