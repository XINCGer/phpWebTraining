<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>打印数组</title>
</head>
<body>

<?php // Script 4-1 – weather1.php
// 创建数组：
$weather = array (
   'Monday' => '晴转多云',
   'Tuesday' => '多云转阴',
   'Wednesday' => '阴有阵雨',
   'Thursday' => '多云',
   'Friday' => '多云转晴',
   'Saturday' => '多云转阴',
   'Sunday' => '阴有阵雨'
);
 
// 打印数组的值：
foreach ($weather as $day => $content) {
	echo "<p>$day: $content</p>\n";
}

?>
</body>
</html>
