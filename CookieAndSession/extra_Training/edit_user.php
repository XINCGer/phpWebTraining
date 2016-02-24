<?php # Script 10-3 - edit_user.php
$page_title = '编辑用户信息';
include ('./includes/header.html');

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { 
	$id = $_POST['id'];
} else { 
	echo '<h1 id="mainhead">页面错误</h1>
	<p class="error">页面发生错误。</p><p><br /><br /></p>';
	include ('./includes/footer.html'); 
	exit();
}
require_once("./includes/mysql_connect.php");
if (isset($_POST['Submit'])) {
	$errors = array(); 
	
	if (empty($_POST['name'])) {
		$errors[] = '您忘记输入用户名.';
	}
	if (empty($_POST['email'])) {
		$errors[] = '您忘记输入您的EMAIL地址.';
	}
	
	if (empty($errors)) { 
		$query = "SELECT user_id FROM users WHERE email='{$_POST['email']}' AND user_id != $id";
		$result = mysql_query($query);
		if (mysql_num_rows($result) == 0) {

			$query = "UPDATE users SET name='{$_POST['name']}', email='{$_POST['email']}' WHERE user_id=$id";
			$result = @mysql_query ($query); 
			if (mysql_affected_rows() == 1) {
			
				echo '<h1 id="mainhead">编辑用户信息</h1>
				<p>该用户的信息已被更新。</p><p><br /><br /></p>';	
							
			} else { 
				echo '<h1 id="mainhead">系统错误</h1>
				<p class="error">很抱歉，该用户的信息没有被更新。</p>';
				echo '<p>' . mysql_error() . '</p>';
				include ('./includes/footer.html'); 
				exit();
			}
				
		} else { 
			echo '<h1 id="mainhead">错误！</h1>
			<p class="error">对不起，这个email地址已被注册，请重新选择。</p>';
		}
	} else { 
		echo '<h1 id="mainhead">错误！</h1>
		<p class="error">出现以下错误：<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>请重填：</p><p><br /></p>';
	} 
} 

$query = "SELECT name, email FROM users WHERE user_id=$id";		
$result = @mysql_query ($query); 
if (mysql_num_rows($result) == 1) { 

	$row = mysql_fetch_array ($result, MYSQL_NUM);
	echo '<h2>编辑用户信息</h2>
<form action="edit_user.php" method="post">
<p>用户名： <input type="text" name="name" size="15" maxlength="30" value="' . $row[0] . '" /></p>
<p>Email地址: <input type="text" name="email" size="20" maxlength="40" value="' . $row[1] . '"  /> </p>
<p><input type="submit" name="Submit" value="提交" /></p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} else { 
	echo '<h1 id="mainhead">页面错误</h1>
	<p class="error">页面发生错误。</p><p><br /><br /></p>';
}
mysql_close(); 
include ('./includes/footer.html');
?>