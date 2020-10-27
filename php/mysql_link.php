
<?php

// 连接数据库 
function connectDb($datebase,$host = DB_HOST, $user = DB_USER, $password = DB_PASSWORD,$PORT=DB_PORT)
{
    $link = mysqli_connect($host, $user, $password, $datebase,$PORT);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    mysqli_set_charset($link,'UTF8');
    return $link;
}
// 执行一条SQL语句,返回结果集或布尔值
function execute($link,$query){
    $result = mysqli_query($link,$query);
    if(mysqli_errno($link))
        exit(mysqli_errno($link));
    return $result;
}
// 执行一条SQL语句,返回布尔值
function executeBool($link,$query){
    $bool = mysqli_real_query($link,$query);
    if(mysqli_errno($link))
        exit(mysqli_errno($link));
    return $bool;
}

//关闭与数据库的连接
function closeDb($link){
    mysqli_close($link);
}