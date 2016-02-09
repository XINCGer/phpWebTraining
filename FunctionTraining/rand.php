<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>取得定常的随机字符串</title>
</head>

<body>
<?php 
//取得定常的随机字符串，包含大小写字母和数字
	$length = 5;
	$string = '';
	$arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
	
	$arrlength = count($arr);
	for($i = 0;$i<$length;$i++)
		$string .= $arr[rand(0,$arrlength-1)]; 
	echo $string;
?>
</body>
</html>
