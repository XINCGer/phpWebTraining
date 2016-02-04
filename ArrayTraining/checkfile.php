<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>测试文件格式</title>
</head>

<body>
<?php 
	$filename = "myfile.doc";
	$filetypes = array('jpg','png','gif');
	echo "文件名为：$filename<br />\n"; 
	$file = explode(".",$filename);
	print_r($file);
	echo "<br />";
	$newtype = $file[count($file)-1];
	if(!in_array($newtype, $filetypes))
		echo "文件格式错误，必须是图片！";
	else
		echo "文件格式符合要求，可以上传！";					
?>
</body>
</html>
