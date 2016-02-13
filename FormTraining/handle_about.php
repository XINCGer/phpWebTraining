<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=gb2312" />
	<title>表单反馈信息</title>
</head>
<body>
<?php  # Script 6-4 –handle_about.php 
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$interests = $_POST['interests'];
$comments = $_POST['comments'];

echo "<p>谢谢您 <b>$name</b>, 您的信息如下：<br />";
echo "Email:<b>$email</b><br />";
echo "性别:<b>$gender</b><br />";
echo "年龄层：<b>$age</b><br />";
echo "您的爱好包括：<ul>";
	foreach($interests as $value)
		echo "<li>" . $value . "</li>";
echo "</ul>";
echo "详细介绍：<b>$comments</b><br /></p>";
echo "<p>我们将回复您至<i>$email</i>.</p>\n";

?>
</body>
</html>