<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>取子串</title>
</head>

<body>
<?php
	//取子串
	echo substr("abcdef", 1, 3).'<br />';  // 返回 "bcd"
	echo substr("abcdef", -2).'<br />';    // 返回 "ef"
	echo substr("abcdef", -3, 1).'<br />'; // 返回 "d"
	echo substr("abcdef", 1, -1); // 返回 "bcde"
?>
</body>
</html>
