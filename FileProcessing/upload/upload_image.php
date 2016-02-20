<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=gb2312" />
	<title>上传图片</title>
</head>
<body>

<?php # Script 7-6 - upload_image.php
if (isset($_FILES['upload'])) {
	if($_FILES['upload']['error'] == 2){
		echo '<p><font color="red">请上传一个小于512K的图片。</font></p>';
	}else{
		$allowed = array ('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
			if (move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/{$_FILES['upload']['name']}")) {
				echo '<p>文件已被上传。</p>';
				echo "<img src=\"uploads/{$_FILES['upload']['name']}\" />";
			} else { 
				echo '<p><font color="red">文件上传有误: </b>';
				switch ($_FILES['upload']['error']) {
					case 1:
						echo '这个文件超出php.ini中设定的upload_max_filesize指定大小。';
						break;
					case 2:
						echo '这个文件超出表单中设定的MAX_FILE_SIZE的指定大小。';
						break;
					case 3:
						echo '文件仅被部分上传。';
						break;
					case 4:
						echo '文件未被上传。';
						break;
					case 6:
						echo '没有可用的临时文件夹。';
						break;
					default:
						echo '系统错误。';
						break;
				} 
				echo '</b></font></p>';
			} 
	 	} else { 
			echo '<p><font color="red">请选择图片格式文件上传。</font></p>';
			unlink ($_FILES['upload']['tmp_name']); 
		} 
	} 
}
?>

</body>
</html>