<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=gb2312" />
	<title>Switch分支语句</title>
</head>

<body>
<?php
	switch (date('w')){
		case "1":
			echo "今天星期一，猴子穿新衣。";
			break;
		case "2":
			echo "今天星期二，猴子肚子饿。";
			break;
		case "3":
			echo "今天星期三，猴子去爬山。";
			break;
		case "4":
			echo "今天星期四，猴子去考试。";
			break;
		case "5":
			echo "今天星期五，猴子去跳舞。";
			break;
		default:
			echo "今天放假，不管猴子了…";
			break;
	}
?>

</body>
</html>
