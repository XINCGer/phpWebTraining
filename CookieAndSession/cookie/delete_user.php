<?php # Script - delete_user.php
$page_title = '删除一个用户';
include ('./includes/header.html');

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { 
	$id = $_POST['id'];
} else { 
	echo '<h1 id="mainhead">页面错误</h1>
	<p class="error">页面出现错误。</p><p><br /><br /></p>';
	include ('./includes/footer.html'); 
	exit();
}

require_once("./includes/mysql_connect.php");
if (isset($_POST['Submit'])) {
	if ($_POST['sure'] == 'Yes') { 
		$query = "DELETE FROM users WHERE user_id=$id";		
		$result = @mysql_query ($query); 
		if (mysql_affected_rows() == 1) { 
			echo '<h1 id="mainhead">删除一个用户</h1>
		<p>该用户已被成功删除。</p><p><br /><br /></p>';	
		} else { 
			echo '<h1 id="mainhead">系统错误</h1>
			<p class="error">很抱歉，该用户没有被删除。</p>';
			echo '<p>' . mysql_error() . '</p>'; 
		}
	} else { 
		echo '<h1 id="mainhead">删除一个用户</h1>
		<p>该用户没有被删除。</p><p><br /><br /></p>';	
	}
} else {

	$query = "SELECT name FROM users WHERE user_id=$id";		
	$result = @mysql_query ($query);
	if (mysql_num_rows($result) == 1) { 

		$row = mysql_fetch_array ($result, MYSQL_NUM);
		echo '<h2>删除一个用户</h2>
	<form action="delete_user.php" method="post">
	<h3>要删除的用户为： ' . $row[0] . '</h3>
	<p>您确定要删除该用户吗？<br />
	<input type="radio" name="sure" value="Yes" /> 是
	<input type="radio" name="sure" value="No" checked="checked" /> 否</p>
	<p><input type="submit" name="Submit" value="提交" /></p>
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
	} else { 
		echo '<h1 id="mainhead">页面错误</h1>
		<p class="error">页面出现错误。</p><p><br /><br /></p>';
	}
} 
mysql_close(); 
include ('./includes/footer.html');
?>