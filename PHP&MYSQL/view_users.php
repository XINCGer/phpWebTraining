<?php # Script 9-5 - view_users.php（基于9-4修改版本）
$page_title = '查看当前所有用户';
include ('./includes/header.html');
echo '<h1 id="mainhead">注册用户</h1>';

require_once("./includes/mysql_connect.php");
$sql = "SELECT name, DATE_FORMAT(registration_date, '%Y年%m月%d日') AS dr FROM users ORDER BY registration_date ASC";		
mysql_query("SET NAMES 'gb2312'");
$result = @mysql_query ($sql); 
$num = mysql_num_rows($result);

if ($num > 0) { 
	echo "<p>共有 $num 位注册用户</p>\n";
	echo '<table align="center" cellspacing="0" cellpadding="5">
	<tr><td><b>姓名</b></td><td><b>注册时间</b></td></tr>';

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo '<tr><td>' . $row['name'] . '</td><td>' . $row['dr'] . '</td></tr>';
	}

	echo '</table>';
	mysql_free_result ($result); 

} else { 
	echo '<p class="error">当前还没有注册用户。</p>';
}

mysql_close(); 
include ('./includes/footer.html'); 
?>