<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>ȡ�Ӵ�</title>
</head>

<body>
<?php
	//ȡ�Ӵ�
	echo substr("abcdef", 1, 3).'<br />';  // ���� "bcd"
	echo substr("abcdef", -2).'<br />';    // ���� "ef"
	echo substr("abcdef", -3, 1).'<br />'; // ���� "d"
	echo substr("abcdef", 1, -1); // ���� "bcde"
?>
</body>
</html>
