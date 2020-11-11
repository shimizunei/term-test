<?php
require_once './php/config.php';
require_once './php/mysql_link.php';
session_start();
// 如果未登录
if (!isset($_SESSION['admin'])) {
    Header("Location:/index.php");
}
// 连接数据库
global $link, $link2;
$link = connectDb('content');
$link2 = connectDb('formcontent');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username'] . $_GET['formname']; ?></title>
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/css/fiiform.css">
    <script src="/js/fillform.js"></script>
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
            <a href=""><i></i>
                <h4>退出</h4>
            </a>
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
        <div class="title ellipsis">
            <?php
            $query = "select * from maininfo where title='$_GET[formname]' limit 1";
            $result = execute($link, $query);
            $arr = mysqli_fetch_row($result);
            echo $_SESSION['username'] . $_GET['formname'];
            ?>
        </div>
        <div class="content">

            <?php
            function xls($arr)
            {
                global $link, $link2;
                $num = count($arr);
                //遍历 递归直到不再嵌套表
                if (!$arr[2]) {
                    for ($i = 5; $i < $num; $i++) {
                        if ($arr[$i]) {
                            $query = "select * from `secondaryinfo-xls` where protitle='$arr[3]' and ind=" . ($i - 4) . " limit 1";
                            $resultxls = execute($link, $query);
                            $arrxls = mysqli_fetch_row($resultxls);
                            xls($arrxls);
                        }
                    }
                } else {
                    $title = "";
                    $item = "";
                    for ($i = 5; $i < $num; $i++) {
                        if ($arr[$i]) {
                            $title .= "<th>" . $arr[$i] . "</th>";
                            $item .= "`$arr[$i]` VARCHAR(45) NULL,";
                        }
                    }
                    $create = "CREATE TABLE `formcontent`.`$arr[0]-$arr[3]` (`id` INT NOT NULL AUTO_INCREMENT," . $item
                        . "PRIMARY KEY (`id`,`$arr[5]`));";
                    // 创建表
                    // execute($link2, $create);

                    $query = "select * from `$arr[0]-$arr[3]`";
                    $resultxls = execute($link2, $query);
                    $item = "";
                    while ($arrxls = mysqli_fetch_row($resultxls)) {
                        $item .= "<tr class='col'><form action='/form_temp.php' method='get' target='_blank'>";
                        for ($i = 1; $i < count($arrxls); $i++)
                            $item .= "<td><input type='text' value='$arrxls[$i]' name='" . $arr[$i + 4] . "' autocomplete='off' spellcheck='false'></div></td>";
                        $item .= "
                                    <td>
                                    <input class='hide' type='text' name='id' value='$arrxls[0]'>
                                    <input class='hide' type='text' name='formname' value='$arr[0]-$arr[3]'>
                                    <input type='submit' name='change' value='提交'>
                                    <input type='submit' id='delete' name='delete' value='删除'>
                                    </td></form></tr>";
                    }
                    print_r($arrxls);
                    echo " 
                    <div class='table'>
                    <table>
                        <caption>" . $arr[3] . "</caption>
                        <tr>
                            " . $title . "
                            <th>操作</th>
                        </tr>
                        " . $item . "
                    </table>
                    </div>";
                }
            }
            if ($arr[1]) {
                echo "<div class='section'>";
                echo "<div class='text'>$arr[1]</div>";
                echo "<div class='textarea'contenteditable='true'>$arr[1]</div>";
                echo "<div class='clear'>清空</div><div class='reset'>重置</div></div>";
            }
            $num = count($arr); // 遍历mainifo
            for ($i = 2; $i < $num; $i++) {
                if ($arr[$i]) { //还有项
                    if ($arr[$i] === 'xls') { //分类
                        $query = "select * from `secondaryinfo-xls` where protitle='$_GET[formname]' and ind=" . ($i - 1) . " limit 1";
                        $resultxls = execute($link, $query);
                        $arrxls = mysqli_fetch_row($resultxls);
                        echo "<div class='subtitle'>" . $i . "." . $arrxls[3] . "</div>";
                        xls($arrxls);
                    }
                    // echo "<div class='text'>$arr[1]</div>";
                    // echo "<div class='textarea'contenteditable='true'>$arr[1]</div>";
                }
            }
            ?>
        </div>
        <!-- 提交按钮 -->
        <div class="submit">
            <h4>提交</h4>
        </div>

</body>