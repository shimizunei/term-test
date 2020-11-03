<?php
require_once './php/config.php';
require_once './php/mysql_link.php';
session_start();
// 如果未登录
if (!isset($_SESSION['admin'])) {
    Header("Location:/index.php");
}
// 连接数据库
$link = connectDb('forms');
$query = "select * from themename";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>主页</title>
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/common.js"></script>
</head>

<body>
    <!-- 头部 -->
    <div class="header">
        <div class="title"><a href="#">基层社区防灾减灾一掌通</a></div>
        <div class="name">
            <?php
            // 设置name
            echo $_SESSION['username'];
            ?>
        </div>
        <!-- 消息通知 -->
        <div class="message"><i></i></div>
    </div>
    <!-- 侧边栏 -->
    <div class="sidevar flexible">
        <!-- 收起 展开 按钮-->
        <div class="turn flexible"><i></i></div>
        <!-- 侧边标题 -->
        <div class="tables">
            <!-- 主页 -->
            <div class="main flexible">
                <div class="inner">
                    <a href="/main.php" disabled="disabled"><i></i>
                        <h4 class="flexible-text">首页</h4>
                    </a>
                </div>
            </div>
            <!-- 填写表单 -->
            <div class="create-form hover flexible">
                <div class="inner open">
                    <a href="" style="pointer-events: none;"><i></i>
                        <h4 class="flexible-text">填写表单</h4>
                    </a>
                    <!-- 展开栏 -->
                    <div class="sideopen flexible-left">
                        <div class="sideopen-inner">
                            <?php
                            $result = execute($link, $query);
                            while ($arr = mysqli_fetch_row($result)) {
                                echo "<dl><dt><h4>$arr[1]</h4></dt>";
                                $num = count($arr);
                                for ($i = 2; $i < $num; $i++) {
                                    if ($arr[$i]) {
                                        echo "<dd><a href='/create-form.php?formname=$arr[$i]'>$arr[$i]</a></dd>";
                                    }
                                }
                                echo "</dl>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 管理表单 -->
            <div class="conform hover flexible">
                <div class="inner open">
                    <a href="" style="pointer-events: none;"><i></i>
                        <h4 class="flexible-text">管理表单</h4>
                    </a>
                    <!-- 展开栏 -->
                    <div class="sideopen  flexible-left">
                        <div class="sideopen-inner">
                            <?php
                            $result = execute($link, $query);
                            while ($arr = mysqli_fetch_row($result)) {
                                echo "<dl><dt><h4>$arr[1]</h4></dt>";
                                $num = count($arr);
                                for ($i = 2; $i < $num; $i++) {
                                    if ($arr[$i]) {
                                        echo "<dd><a href='#'>$arr[$i]</a></dd>";
                                    }
                                }
                                echo "</dl>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 减灾社区标准 -->
            <div class="standare flexible">
                <div class="inner">
                    <a href=""><i></i>
                        <h4 class="flexible-text">减灾社区标准</h4>
                    </a>
                </div>
            </div>
        </div>
        <!--  登出 按钮 -->
        <div class="logout flexible">
            <form action="/login_temp.php">
                <div class="inner">
                    <label for="logout"><i></i>
                        <h4 class="flexible-text">退出系统</h4>
                    </label>
                    <input type="submit" id="logout" name="logout" value="">
                </div>
            </form>
        </div>

    </div>
    <!-- 内容 -->
    <div class="contain  flexible-left">
        <div>
            <div class="big up">
                <div class="title"><i></i>
                    <h4>填写表单</h4>
                </div>
                <div class="body">
                    <ul>
                        <?php
                        $result = execute($link, $query);
                        while ($arr = mysqli_fetch_assoc($result)) {
                            echo "<li><a href='/create-form.php?themename=$arr[theme]'><h4>$arr[theme]</h4></a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="big down">
                <div class="title"><i></i>
                    <h4>管理表单</h4>
                </div>
                <div class="body">
                    <ul>
                        <?php
                        $result = execute($link, $query);
                        while ($arr = mysqli_fetch_assoc($result)) {
                            echo "<li><a href='/create-form.php?themename=$arr[theme]'><h4>$arr[theme]</h4></a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
