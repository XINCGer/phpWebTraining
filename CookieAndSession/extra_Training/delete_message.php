<?php # Script 10-2 - delete_user.php
$page_title = 'ɾ��һ������';
include ('./includes/header.html');

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { 
	$id = $_POST['id'];
} else { 
	echo '<h1 id="mainhead">ҳ�����</h1>
	<p class="error">ҳ����ִ���</p><p><br /><br /></p>';
	include ('./includes/footer.html'); 
	exit();
}

require_once("./includes/mysql_connect.php");
if (isset($_POST['Submit'])) {
	if ($_POST['sure'] == 'Yes') { 
		$query = "DELETE FROM message WHERE mes_id=$id";		
		$result = @mysql_query ($query); 
		if (mysql_affected_rows() == 1) { 
			echo '<h1 id="mainhead">ɾ��һ������</h1>
		<p>�������ѱ��ɹ�ɾ����</p><p><br /><br /></p>';	
		} else { 
			echo '<h1 id="mainhead">ϵͳ����</h1>
			<p class="error">�ܱ�Ǹ��������û�б�ɾ����</p>';
			echo '<p>' . mysql_error() . '</p>'; 
		}
	} else { 
		echo '<h1 id="mainhead">ɾ��һ������</h1>
		<p>������û�б�ɾ����</p><p><br /><br /></p>';	
	}
} else {

	$query = "SELECT title FROM message WHERE mes_id=$id";		
	$result = @mysql_query ($query);
	if (mysql_num_rows($result) == 1) { 

		$row = mysql_fetch_array ($result, MYSQL_NUM);
		echo '<h2>ɾ��һ������</h2>
	<form action="delete_message.php" method="post">
	<h3>Ҫɾ��������Ϊ�� ' . $row[0] . '</h3>
	<p>��ȷ��Ҫɾ����������<br />
	<input type="radio" name="sure" value="Yes" /> ��
	<input type="radio" name="sure" value="No" checked="checked" /> ��</p>
	<p><input type="submit" name="Submit" value="�ύ" /></p>
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
	} else { 
		echo '<h1 id="mainhead">ҳ�����</h1>
		<p class="error">ҳ����ִ���</p><p><br /><br /></p>';
	}
} 
mysql_close(); 
include ('./includes/footer.html');
?>