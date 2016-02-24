<?php # Script 9-6 - view_users.php（第3个版本）
$page_title = '查看当前所有用户';
include ('./includes/header.html');
echo '<h1 id="mainhead">注册用户</h1>';

require_once("./includes/mysql_connect.php");
$sql = "SELECT name, DATE_FORMAT(registration_date, '%Y年%m月%d日') AS dr, user_id FROM users ORDER BY registration_date ASC";		
mysql_query("SET NAMES 'gb2312'");
$result = @mysql_query ($sql); 
$num = mysql_num_rows($result);

if ($num > 0) { 
	echo "<p>共有 $num 位注册用户</p>\n";
	echo '<table align="center" cellspacing="0" cellpadding="5">
	<tr>
		<td align="left"><b>编辑</b></td>
		<td align="left"><b>删除</b></td>
		<td align="left"><b>姓名</b></td>
		<td align="left"><b>注册时间</b></td>
	</tr>
';

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo '<tr>
			<td align="left"><a href="edit_user.php?id=' . $row['user_id'] . '">编辑</a></td>
			<td align="left"><a href="delete_user.php?id=' . $row['user_id'] . '">删除</a></td>
			<td align="left">' . $row['name'] . '</td>
			<td align="left">' . $row['dr'] . '</td>
		</tr>
		';
	}

	echo '</table>';
	mysql_free_result ($result); 

} else { 
	echo '<p class="error">当前还没有注册用户。</p>';
}

mysql_close(); 
include ('./includes/footer.html'); 
?>