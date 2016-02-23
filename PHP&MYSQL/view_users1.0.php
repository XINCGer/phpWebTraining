<?php # Script 9-4 - view_users.php
$page_title = '查看当前所有用户';
include ('./includes/header.html');
echo '<h1 id="mainhead">注册用户</h1>';

require_once("./includes/mysql_connect.php");
$sql = "SELECT name, DATE_FORMAT(registration_date, '%Y年%m月%d日') AS dr FROM users ORDER BY registration_date ASC";		
mysql_query("SET NAMES 'gb2312'");
$result = @mysql_query ($sql); 

if ($result) { 
	echo '<table align="center" cellspacing="0" cellpadding="5">
	<tr><td><b>姓名</b></td><td><b>注册时间</b></td></tr>';

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo '<tr><td>' . $row['name'] . '</td><td>' . $row['dr'] . '</td></tr>';
	}

	echo '</table>';
	mysql_free_result ($result); 

} else { 
	echo '<p class="error">很抱歉发生系统错误如下：</p>';
	echo mysql_error();
}

mysql_close(); 
include ('./includes/footer.html'); 
?>