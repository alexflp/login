<?php
header("Content-type: text/html; charset=utf-8"); 
$key="31b364ef437b419d21ac1cb788a1a2c5";//设置为自己的apikey
$secret="23a39d8ca173d1b7c94f7c2cbe830a6f";
$bg="#000000";//设置登陆页面背景颜色代码（可选，默认为黑色）
$ip = $_SERVER['REMOTE_ADDR'];
$time = time();
$token = md5($time.$ip);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>微信扫码登录或者注册</title>
<script type="text/javascript" src="./js/jquery.min.js"></script> 
</head>
<body style="text-align:center;margin-top:200px;">
扫描下方二维码登录<br>
<?php
    include('qrcode/qrlib.php');
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'qrcode/temp'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'qrcode/temp/';
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    $bg=str_replace("#",'',$bg);
    $content="https://wenfan.cn/wechat/api.php?key=".$key."&token=".$token."&bg=".$bg;
    $filename = $PNG_TEMP_DIR.'QR'.md5($content).'.png';
    QRcode::png($content, $filename, 'L', '3', 2); 
?>
<?php echo '<img class="code" border="0" title="Scan the code in WeChat to start downloading" src="./'.$PNG_WEB_DIR.basename($filename).'" />';?>
<script type="text/javascript">  
checkstatus = function(url) {
    $.getJSON(url, function(data) {  
        for (k in data[0]) {  
            if (k == 'msg') {  
                if (data[0][k] > 0)  
                    window.location.href = "http://baidu.com";//如果确定用户已扫码，则跳转，或执行其他操作
            }  
        }  
    });  
  
}
setInterval(function() {  
  checkstatus('checkstatus.php?token=<?php echo $token ?>')
}, 3000);
</script>
</body>
</html>
