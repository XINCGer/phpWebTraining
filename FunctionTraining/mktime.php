<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������</title>
</head>

<body>
<?php # Script 5-7 �Cmktime.php
	$year = 1985;
	$month = 11; 
	$day = 05;
	
	$birthday = mktime (0, 0, 0, $month, $day, $year);
	$nowdate = mktime();
	$ageunix = $nowdate - $birthday;
	$age = floor($ageunix / (60*60*24*365));
	echo "���䣺$age";
	
?>
</body>
</html>
