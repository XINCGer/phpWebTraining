<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=gb2312" />
	<title>Switch��֧���</title>
</head>

<body>
<?php
	switch (date('w')){
		case "1":
			echo "��������һ�����Ӵ����¡�";
			break;
		case "2":
			echo "�������ڶ������Ӷ��Ӷ���";
			break;
		case "3":
			echo "����������������ȥ��ɽ��";
			break;
		case "4":
			echo "���������ģ�����ȥ���ԡ�";
			break;
		case "5":
			echo "���������壬����ȥ���衣";
			break;
		default:
			echo "����ż٣����ܺ����ˡ�";
			break;
	}
?>

</body>
</html>
