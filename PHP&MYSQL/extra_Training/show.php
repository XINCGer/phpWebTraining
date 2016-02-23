<?php 
$page_title = '显示所有留言';
include ('./includes/header.html');
echo '<h1 id="mainhead">显示所有留言</h1>';

require_once("./includes/mysql_connect.php");
$sql = "SELECT title, DATE_FORMAT(write_date, '%Y年%m月%d日') AS dr FROM message ORDER BY write_date ASC";		
mysql_query("SET NAMES 'gb2312'");
$result = @mysql_query ($sql); 
$num = mysql_num_rows($result);

if ($num > 0) { 
	echo "<p>共有 $num 条</p>\n";
	echo '<table align="center" cellspacing="0" cellpadding="5">
	<tr><td><b>留言主题</b></td><td><b>留言时间</b></td></tr>';

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo '<tr><td>' . $row['title'] . '</td><td>' . $row['dr'] . '</td></tr>';
	}

	echo '</table>';
	mysql_free_result ($result); 

} else { 
	echo '<p class="error">当前还没有任何留言。</p>';
}

mysql_close(); 
include ('./includes/footer.html'); 
?>