<?php
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
            if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
            } else {
                echo "";
            }
            ?>
        </div>
        <!-- 消息通知 -->
        <div class="message"><i></i></div>
    </div>
    <!-- 侧边栏 -->
    <div class="sidevar">
        <!-- 收起 展开 按钮-->
        <div class="turn"><i></i></div>
        <!-- 侧边标题 -->
        <div class="tables">
            <!-- 主页 -->
            <div class="main">
                <div class="inner">
                    <a href="" disabled="disabled"><i></i>
                        <h4>首页</h4>
                    </a>
                </div>
            </div>
            <!-- 填写表单 -->
            <div class="addform hover">
                <div class="inner open">
                    <a href="" style="pointer-events: none;"><i></i>
                        <h4>填写表单</h4>
                    </a>
                    <!-- 展开栏 -->
                    <div class="sideopen">
                        <div class="sideopen-inner">
                            <dl>
                                <dt>
                                    <h4>组织管理</h4>
                                </dt>
                                <dd><a href="#">社区减灾组织管理机构</a></dd>
                                <dd><a href="">社区减灾工作制度</a></dd>
                                <dd><a href="">具体改进措施</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>灾害风险评估</h4>
                                </dt>
                                <dd><a href="#">灾害风险隐患清单</a></dd>
                                <dd><a href="">社区灾害脆弱人群清单</a></dd>
                                <dd><a href="">社区灾害风险地图</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>应急预案</h4>
                                </dt>
                                <dd><a href="#">综合应急预案</a></dd>
                                <dd><a href="">应急预案修订记录</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>应急演习</h4>
                                </dt>
                                <dd><a href="#">应急演练情况记录表</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>宣传教育</h4>
                                </dt>
                                <dd><a href="#">组织减灾宣传教育</a></dd>
                                <dd><a href="">开展防灾减灾活动</a></dd>
                                <dd><a href="">防灾减灾培训</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>应急避难场所</h4>
                                </dt>
                                <dd><a href="#">标志/标识数量统计表</a></dd>
                                <dd><a href="">避难所平面图</a></dd>
                                <dd><a href="">应急疏散图</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>应急储备</h4>
                                </dt>
                                <dd><a href="#">社区应急物资储备</a></dd>
                                <dd><a href="">应急物资社会储备</a></dd>
                                <dd><a href="">社区灾害预警系统</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>志愿者队伍建设</h4>
                                </dt>
                                <dd><a href="#">志愿者队伍参与活动</a></dd>
                                <dd><a href="">社区主要机构参与活动</a></dd>
                                <dd><a href="">社会组织参与活动</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>工作经费</h4>
                                </dt>
                                <dd><a href="#">工作经费</a></dd>
                                <dd><a href="">灾害保险</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>创建特色</h4>
                                </dt>
                                <dd><a href="#">创建特色撰写要求</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 管理表单 -->
            <div class="conform hover">
                <div class="inner open">
                    <a href="" style="pointer-events: none;"><i></i>
                        <h4>管理表单</h4>
                    </a>
                    <!-- 展开栏 -->
                    <div class="sideopen">
                        <div class="sideopen-inner">
                            <dl>
                                <dt>
                                    <h4>组织管理</h4>
                                </dt>
                                <dd><a href="#">社区减灾组织管理机构</a></dd>
                                <dd><a href="">社区减灾工作制度</a></dd>
                                <dd><a href="">具体改进措施</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>灾害风险评估</h4>
                                </dt>
                                <dd><a href="#">灾害风险隐患清单</a></dd>
                                <dd><a href="">社区灾害脆弱人群清单</a></dd>
                                <dd><a href="">社区灾害风险地图</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>应急预案</h4>
                                </dt>
                                <dd><a href="#">综合应急预案</a></dd>
                                <dd><a href="">应急预案修订记录</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>应急演习</h4>
                                </dt>
                                <dd><a href="#">应急演练情况记录表</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>宣传教育</h4>
                                </dt>
                                <dd><a href="#">组织减灾宣传教育</a></dd>
                                <dd><a href="">开展防灾减灾活动</a></dd>
                                <dd><a href="">防灾减灾培训</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>应急避难场所</h4>
                                </dt>
                                <dd><a href="#">标志/标识数量统计表</a></dd>
                                <dd><a href="">避难所平面图</a></dd>
                                <dd><a href="">应急疏散图</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>应急储备</h4>
                                </dt>
                                <dd><a href="#">社区应急物资储备</a></dd>
                                <dd><a href="">应急物资社会储备</a></dd>
                                <dd><a href="">社区灾害预警系统</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>志愿者队伍建设</h4>
                                </dt>
                                <dd><a href="#">志愿者队伍参与活动</a></dd>
                                <dd><a href="">社区主要机构参与活动</a></dd>
                                <dd><a href="">社会组织参与活动</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>工作经费</h4>
                                </dt>
                                <dd><a href="#">工作经费</a></dd>
                                <dd><a href="">灾害保险</a></dd>
                            </dl>
                            <dl>
                                <dt>
                                    <h4>创建特色</h4>
                                </dt>
                                <dd><a href="#">创建特色撰写要求</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 减灾社区标准 -->
            <div class="standare">
                <div class="inner">
                    <a href=""><i></i>
                        <h4>减灾社区标准</h4>
                    </a>
                </div>
            </div>
        </div>
        <!-- 退出 按钮 -->
        <div class="logout">
            <form action="/login_temp.php">
                <div class="inner">
                    <label for="logout"><i></i>
                        <h4>退出系统</h4>
                    </label>
                    <input type="submit" id="logout" name="logout" value="">
                </div>
            </form>
        </div>
        
    </div>
    <!-- 内容 -->
    <div class="contain">
        <div>
            <div class="big up">
                <div class="title"><i></i>
                    <h4>填写表单</h4>
                </div>
                <div class="body">
                    <ul>
                        <li><a href="">
                                <h4>组织管理</h4>
                            </a></li>
                        <li><a href="">
                                <h4>灾害风险评估</h4>
                            </a></li>
                        <li><a href="">
                                <h4>应急预案</h4>
                            </a></li>
                        <li><a href="">
                                <h4>应急演练</h4>
                            </a></li>
                        <li><a href="">
                                <h4>宣传教育</h4>
                            </a></li>
                        <li><a href="">
                                <h4>应急避难场所</h4>
                            </a></li>
                        <li><a href="">
                                <h4>应急储备</h4>
                            </a></li>
                        <li><a href="">
                                <h4>志愿者队伍建设</h4>
                            </a></li>
                        <li><a href="">
                                <h4>工作经费</h4>
                            </a></li>
                        <li><a href="">
                                <h4>创建特色</h4>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="big down">
                <div class="title"><i></i>
                    <h4>管理表单</h4>
                </div>
                <div class="body">
                    <ul>
                        <li><a href="">
                                <h4>组织管理</h4>
                            </a></li>
                        <li><a href="">
                                <h4>灾害风险评估</h4>
                            </a></li>
                        <li><a href="">
                                <h4>应急预案</h4>
                            </a></li>
                        <li><a href="">
                                <h4>应急演练</h4>
                            </a></li>
                        <li><a href="">
                                <h4>宣传教育</h4>
                            </a></li>
                        <li><a href="">
                                <h4>应急避难场所</h4>
                            </a></li>
                        <li><a href="">
                                <h4>应急储备</h4>
                            </a></li>
                        <li><a href="">
                                <h4>志愿者队伍建设</h4>
                            </a></li>
                        <li><a href="">
                                <h4>工作经费</h4>
                            </a></li>
                        <li><a href="">
                                <h4>创建特色</h4>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>



</body>

</html>