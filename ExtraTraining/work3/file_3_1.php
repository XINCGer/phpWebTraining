<html>
<head>
<title>HTML中嵌入PHP</title>
</head>
<body>
<form action="" method="post">
请输入一个数： <input type="text" name="number">
<input type="submit" name="button" value="确认">
<br/>
</form>
</body>
</html>

<?php 
if(isset($_POST["button"])){
	$num = $_POST["number"];
	if($num ==0){
		echo "<script>alert('不能为0！');</script>";
	}
	else{
		$result =1;
		for($tmp=$num;$tmp>=1;$tmp--){
			$result =$result*$tmp;
		}
		echo "$num"."的阶乘是："."$result";
	}
}
?>