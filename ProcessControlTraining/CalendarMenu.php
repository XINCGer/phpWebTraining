<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=gb2312" />
	<title>����</title>
</head>
<body>

<form action="" method="post">
<?php 
// ������������˵�
echo '<select name="year">';
$year = 2005;
while ($year <= 2015) {
	echo "<option value=\"$year\">$year</option>\n";
	$year++;
}
echo '</select>�� ';

// �����·������˵�
echo '<select name="month">';
$month = 1;
do{
	echo "<option value=\"$month\">$month</option>\n";
	$month++;
}while($month <= 12); 
echo '</select>�� ';

// �������������˵�
echo '<select name="day">';
for ($day = 1; $day <= 31; $day++) {
	echo "<option value=\"$day\">$day</option>\n";
}
echo '</select>�� ';

?>
</form>
</body>
</html>