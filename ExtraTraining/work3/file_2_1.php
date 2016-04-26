<html>
<head>
<title>HTML中嵌入PHP</title>
</head>
<body>
<form method="post" action="">
<input type="text" name="txtInput" value="">
<input type="submit" name ="btn" value="提交">
</form>
</body>
</html>

<?php 
if(isset($_POST["btn"])){
	$txt = $_POST['txtInput'];
	if(empty($txt)){
		echo "<script>alert('输入内容不能为空！');</script>";
	}
	else{
		echo "$txt";
	}
}
?> 