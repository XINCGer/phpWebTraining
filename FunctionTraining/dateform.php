<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>日历</title>
</head>

<body>
<?php 
//定义函数，生成年月日三个下拉菜单
function make_calendar_pulldowns(){
	echo '<select name="year">';
	$year = 2005;
	while ($year <= 2015) {
		echo "<option value=\"$year\">$year</option>\n";
		$year++;
	}
	echo '</select>年 ';
	
	echo '<select name="month">';
	$month = 1;
	do{
		echo "<option value=\"$month\">$month</option>\n";
		$month++;
	}while($month <= 12); 
	echo '</select>月 ';
	
	echo '<select name="day">';
	for ($day = 1; $day <= 31; $day++) {
		echo "<option value=\"$day\">$day</option>\n";
	}
	echo '</select>日 ';
}//函数定义结束
?>
请选择一个日期：
<form action="" method="post">
<?php 	
//调用函数
make_calendar_pulldowns();
?>
</form>
</body>
</html>
