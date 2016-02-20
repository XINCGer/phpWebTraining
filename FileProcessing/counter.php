<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>简易计数器</title>
</head>
<body>
<?php 
	$fp = fopen("times.txt", "r");
    $str = fread($fp, filesize("times.txt"));
    $str++;
    fclose($fp);
    $fp = fopen("times.txt", "w");
    fwrite($fp, $str);
    fclose($fp);
?>

您是本站的第 <?php echo $str?> 个访问者。
</body>
</html>
