<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=gb2312" />
	<title>�ϴ�ͼƬ</title>
</head>
<body>

<?php # Script 7-6 - upload_image.php
if (isset($_FILES['upload'])) {
	if($_FILES['upload']['error'] == 2){
		echo '<p><font color="red">���ϴ�һ��С��512K��ͼƬ��</font></p>';
	}else{
		$allowed = array ('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
			if (move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/{$_FILES['upload']['name']}")) {
				echo '<p>�ļ��ѱ��ϴ���</p>';
				echo "<img src=\"uploads/{$_FILES['upload']['name']}\" />";
			} else { 
				echo '<p><font color="red">�ļ��ϴ�����: </b>';
				switch ($_FILES['upload']['error']) {
					case 1:
						echo '����ļ�����php.ini���趨��upload_max_filesizeָ����С��';
						break;
					case 2:
						echo '����ļ����������趨��MAX_FILE_SIZE��ָ����С��';
						break;
					case 3:
						echo '�ļ����������ϴ���';
						break;
					case 4:
						echo '�ļ�δ���ϴ���';
						break;
					case 6:
						echo 'û�п��õ���ʱ�ļ��С�';
						break;
					default:
						echo 'ϵͳ����';
						break;
				} 
				echo '</b></font></p>';
			} 
	 	} else { 
			echo '<p><font color="red">��ѡ��ͼƬ��ʽ�ļ��ϴ���</font></p>';
			unlink ($_FILES['upload']['tmp_name']); 
		} 
	} 
}
?>

</body>
</html>