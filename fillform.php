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
    <script src="https://cdn.staticfile.org/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
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
                        } else
                            break;
                    }
                } else {
                    $item = "";
                    $js = "";
                    for ($i = 5; $i < $num; $i++) {
                        if ($arr[$i]) {
                            $item .= "`$arr[$i]` VARCHAR(45) NULL,";
                        } else
                            break;
                    }
                    $create = "CREATE TABLE `formcontent`.`$arr[0]-$arr[3]` (`id` INT NOT NULL AUTO_INCREMENT," . $item
                        . "PRIMARY KEY (`id`,`$arr[5]`));";
                    // 创建表
                    // execute($link2, $create);

                    $length = $i - 4;

                    $query = "select * from `$arr[0]-$arr[3]`";
                    $resultxls = execute($link2, $query);
                    for ($i = 1; $i < $length; $i++) {
                        $js .= "data-item$i=" . $arr[$i + 4] . " ";
                    }
                    $js .= "data-formname='$arr[0]-$arr[3]' data-length=$length";
                    $item = "";
                    while ($arrxls = mysqli_fetch_row($resultxls)) {
                        $item .= "<form action='/form_temp.php' method='get' target='_blank' data-id='$arrxls[0]'>";
                        for ($i = 1; $i < $length; $i++) {
                            $temp = $arr[$i + 4];
                            $item .= "<label for='$temp' >$temp</label><input type='text' value='$arrxls[$i]' name='$temp' id ='$temp' autocomplete='off' spellcheck='false'>";
                        }
                        $item .= "
                                <input class='hide' type='text' name='id' value='$arrxls[0]'>
                                <input class='hide' type='text' name='formname' value='$arr[0]-$arr[3]'>
                                <input type='submit' name='change' value='修改'>
                                <input type='submit' id='delete' name='delete' value='删除'>
                                </form>";
                    }
                    echo " 
                        <div class='form'>
                        <fieldset>
                            <legend>$arr[3]</legend>
                            $item
                        </fieldset>
                        <div class='additem' $js><i></i>
                            <h4>添加</h4>
                        </div>
                        </div>";
                }
            }
            function printButton($arr,$index){
                echo "<div class='section'>";
                echo "<div class='text'>$arr[$index]</div>";
                echo "<div class='textarea'contenteditable='true'>$arr[$index]</div>";
                echo "<div class='clear'>清空</div><div class='reset'>重置</div>
                <form action='/form_temp.php' method='get' target='_blank'>
                <input class='hide' type='text' name='protitle' value='$arr[0]'>
                <input class='hide' type='text' name='colname' value='col".($index-3)."'>
                <input class='hide' type='text' name='ind' value='".$arr[1]."'>
                <input class='hide' type='text' name='textinner' value=''>
                <input class='sub' type='submit' name='tchange' value='修改'>
                </form></div>";
            }
            if ($arr[1]) {
                printButton($arr,1);
            }
            $num = count($arr); // 遍历mainifo
            for ($i = 2; $i < $num; $i++) {
                if ($arr[$i]) { //还有项
                    if ($arr[$i] === 'xls') { //分类
                        $query = "select * from `secondaryinfo-xls` where protitle='$_GET[formname]' and ind=" . ($i - 1) . " limit 1";
                        $resultxls = execute($link, $query);
                        $arrxls = mysqli_fetch_row($resultxls);
                        echo "<div class='subtitle'>" . ($i - 1) . "." . $arrxls[3] . "</div>";
                        xls($arrxls);
                    } else if ($arr[$i] === 'text') {
                        $query = "select * from `secondaryinfo-text` where protitle='$_GET[formname]' and ind=" . ($i - 1) . " limit 1";
                        $resulttext = execute($link, $query);
                        $arrtext = mysqli_fetch_row($resulttext);
                        echo "<div class='subtitle'>" . ($i - 1) . "." . $arrtext[2] . "</div>";
                        if ($arrtext[3]) {
                            printButton($arrtext,3);
                        }
                        for ($j = 4; $j < count($arrtext); $j++) {
                            if ($arrtext[$j]) {
                                printButton($arrtext,$j);
                            } else
                                break;
                        }
                    }
                } else
                    break;
            }
            ?>
        </div>

        <!-- 提交按钮 -->
        <div class="submit">
            <h4>提交</h4>
        </div>

</body>