<?php 
session_start();
$page_title = '显示所有留言';
include ('./includes/header.html');
echo '<h1 id="mainhead">显示所有留言</h1>';

require_once("./includes/mysql_connect.php");
$sql = "SELECT mes_id,title, DATE_FORMAT(write_date, '%Y年%m月%d日') AS dr FROM message ORDER BY write_date ASC";		
mysql_query("SET NAMES 'gb2312'");
$result = @mysql_query ($sql); 
$num = mysql_num_rows($result);

if ($num > 0) { 
	echo "<p>共有 $num 条</p>\n";
	echo '<table align="center" cellspacing="0" cellpadding="5"><tr>';
	if(isset($_SESSION['agent'])){
		echo '<td align="left"><b>编辑</b></td><td align="left"><b>删除</b></td>';
	}
	echo '<td><b>留言主题</b></td><td><b>留言时间</b></td></tr>';

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo '<tr>';
		if(isset($_SESSION['agent'])){
		echo '<td align="left"><a href="edit_message.php?id=' . $row['mes_id'] . '">编辑</a></td>
			  <td align="left"><a href="delete_message.php?id=' . $row['mes_id'] . '">删除</a></td>';
	}
		echo '<td align="left"><a href="message.php?id=' . $row['mes_id'] .'">' . $row['title'] . '</a></td>
			<td>' . $row['dr'] . '</td></tr>';
	}

	echo '</table>';
	mysql_free_result ($result); 

} else { 
	echo '<p class="error">当前还没有任何留言。</p>';
}

mysql_close(); 
include ('./includes/footer.html'); 
?>