<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>九九乘法表－表格显示</title>
</head>

<body>
<?php
	$n = 9; 
	echo "<table border=1>\n";
			for($x = 1;$x <= $n;$x++){
				echo "<tr>\n";
				for($y = 1;$y <= $n;$y++){
					echo "<td width=\"60\">\n";
					echo $x."*".$y."=".($x*$y)."\n";
					echo "</td>";
			   }
			   echo "</tr>\n";
			}
		echo "</table>\n";
?>
</body>
</html>
