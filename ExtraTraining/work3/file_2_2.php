<html>
<head>
<title>HTML中嵌入PHP</title>
</head>
<body>
<form action="" method="post">
请输入：<input type="text" name="text_1" value="" size="50">
<input type="submit" name="button" value="提交">
</form>

<form action="">
显示：<input type="text" name="text_2" value="<?php 
if(isset($_POST["button"])){
	echo $_POST["text_1"];
}
else echo "";
?>" size="50">
</form>
</body>
</html>