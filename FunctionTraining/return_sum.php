<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>函数返回值</title>
</head>

<body>
<?php # Script 5-3 – returnsum.php
//定义函数，求两数之和
function sum($a, $b){
	$total = $a +$b;
	return $total;
}
$x = 100;
$y = 1;
$totalvalue = sum($x,$y);
echo "x + y = $totalvalue"; 
?>
</body>
</html>
