<?php 
session_start();
if(!isset($_SESSION['agent']) OR ($_SESSION ['agent'] != md5($_SERVER['HTTP_USER_AGENT']))){
	$url = 'index.php'; 
	header("Location: $url");
	exit(); 
}

$page_title = '�鿴��ǰ�����û�';
include ('./includes/header.html');
echo '<h1 id="mainhead">ע���û�</h1>';

require_once("./includes/mysql_connect.php");
$sql = "SELECT name, DATE_FORMAT(registration_date, '%Y��%m��%d��') AS dr, user_id FROM users ORDER BY registration_date ASC";		
mysql_query("SET NAMES 'gb2312'");
$result = @mysql_query ($sql); 
$num = mysql_num_rows($result);

if ($num > 0) { 
	echo "<p>���� $num λע���û�</p>\n";
	echo '<table align="center" cellspacing="0" cellpadding="5">
	<tr>
		<td align="left"><b>�༭</b></td>
		<td align="left"><b>ɾ��</b></td>
		<td align="left"><b>����</b></td>
		<td align="left"><b>ע��ʱ��</b></td>
	</tr>
';

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo '<tr>
			<td align="left"><a href="edit_user.php?id=' . $row['user_id'] . '">�༭</a></td>
			<td align="left"><a href="delete_user.php?id=' . $row['user_id'] . '">ɾ��</a></td>
			<td align="left">' . $row['name'] . '</td>
			<td align="left">' . $row['dr'] . '</td>
		</tr>
		';
	}

	echo '</table>';
	mysql_free_result ($result); 

} else { 
	echo '<p class="error">��ǰ��û��ע���û���</p>';
}

mysql_close(); 
include ('./includes/footer.html'); 
?>