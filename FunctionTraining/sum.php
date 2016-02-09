<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>参数传递</title>
</head>

<body>
<?php # Script 5-2 – sum.php
//求和参数
function sum($a, $b){
	$total = $a +$b;
	echo "x + y = $total";
}
$x = 100;
$y = 1;
sum($x,$y);
?>
</body>
</html>
