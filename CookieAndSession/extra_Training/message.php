<?php 
session_start();
$page_title = '��ʾ��������';
include ('./includes/header.html');

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { 
	$id = $_POST['id'];
} else { 
	echo '<h1 id="mainhead">ҳ�����</h1>
	<p class="error">ҳ�淢������</p><p><br /><br /></p>';
	include ('./includes/footer.html'); 
	exit();
}
require_once("./includes/mysql_connect.php");
$sql = "SELECT user_id,title,content, DATE_FORMAT(write_date, '%Y��%m��%d��') AS dr FROM message WHERE mes_id=$id";		
mysql_query("SET NAMES 'gb2312'");
$result = @mysql_query ($sql); 
$num = mysql_num_rows($result);

if ($num > 0) { 
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo "<h1 id=\"mainhead\">{$row['title']}</h1><hr />";
		echo "<p>����ʱ�䣺{$row['dr']}</p>";
		$sql2 = "SELECT name FROM users WHERE user_id={$row['user_id']}";		
		mysql_query("SET NAMES 'gb2312'");
		$result2 = @mysql_query ($sql2); 
		$num2 = @mysql_num_rows($result2);
		if ($num2 > 0) { 
			while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {
				echo "<p>�����û���{$row2['name']}</p>";
			}
		}else{
			echo '<p>�����û���δ֪</p>';
		}
		echo $row['content'];
	}
	mysql_free_result ($result); 

} else { 
	echo '<p class="error">ҳ������뷵�����ԡ�</p>';
}

mysql_close(); 
include ('./includes/footer.html'); 
?>