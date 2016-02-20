<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>乘法表－表格显示</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
  请输入：
  <input name="number" type="text" id="number" /> 
  <input type="submit" name="Submit" value="开始计算" />
</form>
<?php 
	if(isset($_POST['Submit'])){
		if(intval($_POST['number'])){
			include("nnfunc.php");
			nn($_POST['number']);
		}else{
			echo "请输入一个数字";
		}
	}
?>
</body>
</html>
