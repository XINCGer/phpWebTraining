<?php # Script 10-3 - edit_user.php
$page_title = '�༭����';
include ('./includes/header.html');

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { 
	$id = $_POST['id'];
} else { 
	echo '<h1 id="mainhead">ҳ�����</h1>
	<p class="error">ҳ�淢������</p><p><br /><br /></p>';
	include ('./includes/footer.html'); 
	exit();
}
require_once("./includes/mysql_connect.php");
if (isset($_POST['Submit'])) {
	$errors = array(); 
	
	if (empty($_POST['title'])) {
		$errors[] = '������������������.';
	}
	if (empty($_POST['content'])) {
		$errors[] = '������������������.';
	}
	
	if (empty($errors)) { 
		$content = stripslashes($_POST['content']);
		$content = htmlspecialchars($content);
		$content = str_replace(" ","&nbsp;",$content); 
		$content = nl2br($content); 

			$query = "UPDATE message SET title='{$_POST['title']}', content='$content' WHERE mes_id=$id";
			$result = @mysql_query ($query); 
			if (mysql_affected_rows() == 1) {
			
				echo '<h1 id="mainhead">�༭����</h1>
				<p>�����Ե���Ϣ�ѱ����¡�</p><p><br /><br /></p>';	
							
			} else { 
				echo '<h1 id="mainhead">ϵͳ����</h1>
				<p class="error">�ܱ�Ǹ�������Ե���Ϣû�б����¡�</p>';
				echo '<p>' . mysql_error() . '</p>';
				include ('./includes/footer.html'); 
				exit();
			}
				
	} else { 
		echo '<h1 id="mainhead">����</h1>
		<p class="error">�������´���<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>�����</p><p><br /></p>';
	} 
} 

$query = "SELECT title, content FROM message WHERE mes_id=$id";		
$result = @mysql_query ($query); 
if (mysql_num_rows($result) == 1) { 

	$row = mysql_fetch_array ($result, MYSQL_NUM);
	echo '<h2>�༭������Ϣ</h2>
<form action="edit_message.php" method="post">
<p>�������� <input type="text" name="title" size="30" value="' . $row[0] . '" /></p>
<p>��������: <textarea name="content" cols="30" rows="5">'.stripslashes($row[1]).   '</textarea></p>
<p><input type="submit" name="Submit" value="�ύ" /></p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} else { 
	echo '<h1 id="mainhead">ҳ�����</h1>
	<p class="error">ҳ�淢������</p><p><br /><br /></p>';
}
mysql_close(); 
include ('./includes/footer.html');
?>