<?php

require_once './php/config.php';
require_once './php/mysql_link.php';
if(isset($_POST['submit'])){
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $link = connectDb('users');
    $query = "select * from user where username='$username' and password='$password' limit 1";
    $result = execute($link, $query);
    $arr = mysqli_fetch_assoc($result);
        print_r($arr);
    if ($result->num_rows) {    
        echo "<h4>登陆成功</h4>";
    } else {
        echo "<h4>登陆失败</h4>";
}
}