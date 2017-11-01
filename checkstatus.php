<?php 
$token=$_GET['token'];
if($token !== ""){
include("./config.php");
$sql="SELECT * FROM wechat WHERE token='$token'";
$res=mysql_query($sql);
$num=mysql_num_rows($res);
if ($num> 0){
	$msgn = array (array ("msg" => 1) );
	echo json_encode ( $msgn );
}
}
?>