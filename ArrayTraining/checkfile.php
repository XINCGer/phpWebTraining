<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�����ļ���ʽ</title>
</head>

<body>
<?php 
	$filename = "myfile.doc";
	$filetypes = array('jpg','png','gif');
	echo "�ļ���Ϊ��$filename<br />\n"; 
	$file = explode(".",$filename);
	print_r($file);
	echo "<br />";
	$newtype = $file[count($file)-1];
	if(!in_array($newtype, $filetypes))
		echo "�ļ���ʽ���󣬱�����ͼƬ��";
	else
		echo "�ļ���ʽ����Ҫ�󣬿����ϴ���";					
?>
</body>
</html>
