<?php # Script 10-3 - edit_user.php
$page_title = '�༭�û���Ϣ';
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
	
	if (empty($_POST['name'])) {
		$errors[] = '�����������û���.';
	}
	if (empty($_POST['email'])) {
		$errors[] = '��������������EMAIL��ַ.';
	}
	
	if (empty($errors)) { 
		$query = "SELECT user_id FROM users WHERE email='{$_POST['email']}' AND user_id != $id";
		$result = mysql_query($query);
		if (mysql_num_rows($result) == 0) {

			$query = "UPDATE users SET name='{$_POST['name']}', email='{$_POST['email']}' WHERE user_id=$id";
			$result = @mysql_query ($query); 
			if (mysql_affected_rows() == 1) {
			
				echo '<h1 id="mainhead">�༭�û���Ϣ</h1>
				<p>���û�����Ϣ�ѱ����¡�</p><p><br /><br /></p>';	
							
			} else { 
				echo '<h1 id="mainhead">ϵͳ����</h1>
				<p class="error">�ܱ�Ǹ�����û�����Ϣû�б����¡�</p>';
				echo '<p>' . mysql_error() . '</p>';
				include ('./includes/footer.html'); 
				exit();
			}
				
		} else { 
			echo '<h1 id="mainhead">����</h1>
			<p class="error">�Բ������email��ַ�ѱ�ע�ᣬ������ѡ��</p>';
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

$query = "SELECT name, email FROM users WHERE user_id=$id";		
$result = @mysql_query ($query); 
if (mysql_num_rows($result) == 1) { 

	$row = mysql_fetch_array ($result, MYSQL_NUM);
	echo '<h2>�༭�û���Ϣ</h2>
<form action="edit_user.php" method="post">
<p>�û����� <input type="text" name="name" size="15" maxlength="30" value="' . $row[0] . '" /></p>
<p>Email��ַ: <input type="text" name="email" size="20" maxlength="40" value="' . $row[1] . '"  /> </p>
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