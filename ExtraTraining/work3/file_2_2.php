<html>
<head>
<title>HTML��Ƕ��PHP</title>
</head>
<body>
<form action="" method="post">
�����룺<input type="text" name="text_1" value="" size="50">
<input type="submit" name="button" value="�ύ">
</form>

<form action="">
��ʾ��<input type="text" name="text_2" value="<?php 
if(isset($_POST["button"])){
	echo $_POST["text_1"];
}
else echo "";
?>" size="50">
</form>
</body>
</html>