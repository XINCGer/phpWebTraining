<html>
<head>
<title>HTML��Ƕ��PHP</title>
</head>
<body>
<form method="post" action="">
<input type="text" name="txtInput" value="">
<input type="submit" name ="btn" value="�ύ">
</form>
</body>
</html>

<?php 
if(isset($_POST["btn"])){
	$txt = $_POST['txtInput'];
	if(empty($txt)){
		echo "<script>alert('�������ݲ���Ϊ�գ�');</script>";
	}
	else{
		echo "$txt";
	}
}
?> 