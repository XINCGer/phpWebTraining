<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>@pple�ļ���Ӫ</title>
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
<?php  # Script 5-8 �Ccountimg.php
	$number = 123456;
	$str = '';	
	
	for($i = 0;$i < strlen($number);$i++){
		$digit = substr($number,$i,1);
		$str .= "<img src=\"img/$digit.gif\">";
	}
?>
<p align="center" class="style1"><span class="style2">@pple</span><span class="style3">�ļ���Ӫ</span></p>
<p align="center" class="style4">��վ��������<span class="style5"><?php echo $str?></span>�˵��ã�</p>
</body>
</html>
