<?php # Script 10-3 - edit_user.php
$page_title = '编辑留言';
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
	
	if (empty($_POST['title'])) {
		$errors[] = '您忘记输入留言主题.';
	}
	if (empty($_POST['content'])) {
		$errors[] = '您忘记输入留言内容.';
	}
	
	if (empty($errors)) { 
		$content = stripslashes($_POST['content']);
		$content = htmlspecialchars($content);
		$content = str_replace(" ","&nbsp;",$content); 
		$content = nl2br($content); 

			$query = "UPDATE message SET title='{$_POST['title']}', content='$content' WHERE mes_id=$id";
			$result = @mysql_query ($query); 
			if (mysql_affected_rows() == 1) {
			
				echo '<h1 id="mainhead">编辑留言</h1>
				<p>该留言的信息已被更新。</p><p><br /><br /></p>';	
							
			} else { 
				echo '<h1 id="mainhead">系统错误</h1>
				<p class="error">很抱歉，该留言的信息没有被更新。</p>';
				echo '<p>' . mysql_error() . '</p>';
				include ('./includes/footer.html'); 
				exit();
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

$query = "SELECT title, content FROM message WHERE mes_id=$id";		
$result = @mysql_query ($query); 
if (mysql_num_rows($result) == 1) { 

	$row = mysql_fetch_array ($result, MYSQL_NUM);
	echo '<h2>编辑留言信息</h2>
<form action="edit_message.php" method="post">
<p>留言主题 <input type="text" name="title" size="30" value="' . $row[0] . '" /></p>
<p>留言内容: <textarea name="content" cols="30" rows="5">'.stripslashes($row[1]).   '</textarea></p>
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