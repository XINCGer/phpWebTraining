<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=gb2312" />
	<title>��������Ϣ</title>
</head>
<body>
<?php  # Script 6-4 �Chandle_about.php 
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$interests = $_POST['interests'];
$comments = $_POST['comments'];

echo "<p>лл�� <b>$name</b>, ������Ϣ���£�<br />";
echo "Email:<b>$email</b><br />";
echo "�Ա�:<b>$gender</b><br />";
echo "����㣺<b>$age</b><br />";
echo "���İ��ð�����<ul>";
	foreach($interests as $value)
		echo "<li>" . $value . "</li>";
echo "</ul>";
echo "��ϸ���ܣ�<b>$comments</b><br /></p>";
echo "<p>���ǽ��ظ�����<i>$email</i>.</p>\n";

?>
</body>
</html>