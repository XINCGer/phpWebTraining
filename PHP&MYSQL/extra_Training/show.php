<?php 
$page_title = '��ʾ��������';
include ('./includes/header.html');
echo '<h1 id="mainhead">��ʾ��������</h1>';

require_once("./includes/mysql_connect.php");
$sql = "SELECT title, DATE_FORMAT(write_date, '%Y��%m��%d��') AS dr FROM message ORDER BY write_date ASC";		
mysql_query("SET NAMES 'gb2312'");
$result = @mysql_query ($sql); 
$num = mysql_num_rows($result);

if ($num > 0) { 
	echo "<p>���� $num ��</p>\n";
	echo '<table align="center" cellspacing="0" cellpadding="5">
	<tr><td><b>��������</b></td><td><b>����ʱ��</b></td></tr>';

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo '<tr><td>' . $row['title'] . '</td><td>' . $row['dr'] . '</td></tr>';
	}

	echo '</table>';
	mysql_free_result ($result); 

} else { 
	echo '<p class="error">��ǰ��û���κ����ԡ�</p>';
}

mysql_close(); 
include ('./includes/footer.html'); 
?>