<html>
<head>
<title>HTML��Ƕ��PHP</title>
</head>
<body>
<form action="" method="post">
������һ������ <input type="text" name="number">
<input type="submit" name="button" value="ȷ��">
<br/>
</form>
</body>
</html>

<?php 
if(isset($_POST["button"])){
	$num = $_POST["number"];
	if($num ==0){
		echo "<script>alert('����Ϊ0��');</script>";
	}
	else{
		$result =1;
		for($tmp=$num;$tmp>=1;$tmp--){
			$result =$result*$tmp;
		}
		echo "$num"."�Ľ׳��ǣ�"."$result";
	}
}
?>