<?php # Script 9-4 - view_users.php
$page_title = '�鿴��ǰ�����û�';
include ('./includes/header.html');
echo '<h1 id="mainhead">ע���û�</h1>';

require_once("./includes/mysql_connect.php");
$sql = "SELECT name, DATE_FORMAT(registration_date, '%Y��%m��%d��') AS dr FROM users ORDER BY registration_date ASC";		
mysql_query("SET NAMES 'gb2312'");
$result = @mysql_query ($sql); 

if ($result) { 
	echo '<table align="center" cellspacing="0" cellpadding="5">
	<tr><td><b>����</b></td><td><b>ע��ʱ��</b></td></tr>';

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo '<tr><td>' . $row['name'] . '</td><td>' . $row['dr'] . '</td></tr>';
	}

	echo '</table>';
	mysql_free_result ($result); 

} else { 
	echo '<p class="error">�ܱ�Ǹ����ϵͳ�������£�</p>';
	echo mysql_error();
}

mysql_close(); 
include ('./includes/footer.html'); 
?>