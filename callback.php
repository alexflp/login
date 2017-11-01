<?php
header("Content-Type:text/html;charset=utf-8");
include("./config.php");
$apikey = "31b364ef437b419d21ac1cb788a1a2c5";//设置为自己的apikey
$secretkey= "23a39d8ca173d1b7c94f7c2cbe830a6f";//设置为自己的secret
if($_SERVER["REQUEST_METHOD"] === "POST")
{
$key=$_POST['key'];
$token=$_POST['token'];
$user=$_POST['user'];
$secret=$_POST['secret'];
if($key == $apikey && $secret == $secretkey && !empty($user)){//验证正确，将token和微信openid写入数据库，供前端查询对比
    $sql = "INSERT INTO `wechat`(`token`, `user`) VALUES ('".$token."','".$user."')";
    mysql_query($sql) or die("error 01");
    echo "<script>alert('扫码成功！');window.location.href='http://baidu.com/';</script>";//扫码成功后，微信客户端跳转代码
    exit;
}else{
	echo "<script>alert('apikey或secret错误，或微信扫码错误，请重试！');window.location.href='http://qq.com/';</script>";//扫码成功后，微信客户端跳转代码
    exit;
}
}

?>