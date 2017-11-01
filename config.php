<?php
$conn=mysql_connect('localhost','root','');//数据库用户名密码
mysql_select_db( 'wechat' ,$conn) or die("error000");//选择数据库
mysql_query("SET NAMES 'UTF8'");
?>