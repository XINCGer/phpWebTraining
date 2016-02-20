<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>@pple的减肥营</title>
<style type="text/css">
<!--
.style1 {
	font-size: 50px;
	font-family: Tahoma;
}
.style2 {color: #669900}
.style3 {color: #CC0000}
.style4 {
	font-size: 24px;
	color: #0000FF;
	font-family: Tahoma;
}
.style5 {
	font-size: 24px;
	color: #DB4D4D;
}
-->
</style>
</head>
<body>
<?php 
	$fp = fopen("times.txt", "r");
    //以读形式打开记录以往访问人数的文件times.txt

    $str1 = fread($fp, filesize("times.txt"));
    //从文件中读入数值

    $str1++;
    //计数器加入

    fclose($fp);
    //关闭文件

    $fp = fopen("times.txt", "w");
    //一写的方式打开记录访问人数的文件times.txt

    fwrite($fp, $str1);
    //把最新的访问人数写入文件

    fclose($fp);
    //关闭文件

	
	
	for($i = 0;$i < strlen($str1);$i++){
	//从0到文件取出的字符串长度循环
		$digit = substr($str1,$i,1);
		//取出每一个数字
		$str .= "<img src=\"blue/blue_$digit.gif\">";
		//设定数字对应的图片路径
	}

?>
<p align="center" class="style1"><span class="style2">@pple</span><span class="style3">的减肥营</span></p>
<p align="center" class="style4">开站至今，已有<span class="style5"><?php echo $str?></span>人到访，</p>
<p align="center" class="style4">但是...<img src="blue/blue_0.gif" width="122" height="104">人减肥成功...</p>
</body>
</html>
