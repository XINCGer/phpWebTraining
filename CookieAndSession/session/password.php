<?php # Script 9-7 - password.php
$page_title = '�޸���������';
include ('./includes/header.html');
if (isset($_POST['Submit'])) {
	$errors = array(); // Initialize error array.
	if (empty($_POST['email'])) {
		$errors[] = '��������������EMAIL��ַ.';
	}
	if (empty($_POST['password'])) {
		$errors[] = '���������뵱ǰ������.';
	}
	if (!empty($_POST['password1'])) {
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = '�����������벻ͬ.';
		}
	} else {
		$errors[] = '����������������.';
	}
	
	if (empty($errors)) { 
		require_once("./includes/mysql_connect.php");
		$query = "SELECT user_id FROM users WHERE (email='{$_POST['email']}' AND password=SHA('{$_POST['password']}') )";
		$result = mysql_query($query);
		$num = mysql_num_rows($result);
		
		if (mysql_num_rows($result) == 1) { 
			$row = mysql_fetch_array($result, MYSQL_NUM);
			$query = "UPDATE users SET password=SHA('{$_POST['password1']}') WHERE user_id=$row[0]";		
			$result = @mysql_query ($query);
			
			if (mysql_affected_rows() == 1) { 
				echo '<h1 id="mainhead">лл����</h1>
				<p>���������ѱ��ɹ��޸ġ�</p><p><br /></p>';	
				include ('./includes/footer.html'); 
				exit();
			} else { 
				echo '<h1 id="mainhead">ϵͳ����</h1>
				<p class="error">�ܱ�Ǹ���޸�����û�óɹ����������´���</p>';
				echo '<p>' . mysql_error() . '</p>'; 
				include ('./includes/footer.html'); 
				exit();
			}
				
		} else { 
			echo '<h1 id="mainhead">����</h1>
			<p class="error">�Բ������ĵ����ʼ���ַ��ԭ�������벻ƥ�䡣</p>';
		}
		mysql_close(); 
	} else { 
	
		echo '<h1 id="mainhead">����</h1>
		<p class="error">�������´���<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>�����</p><p><br /></p>';
	} 
} 
?>
<h2>�޸���������</h2>
<form action="password.php" method="post">
	<table width="299" height="151">
      <tr>
        <td>Email��ַ:</td>
        <td><input type="text" name="email" size="20" maxlength="40" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></td>
      </tr>
	  <tr>
        <td>ԭ��������:</td>
        <td><input type="password" name="password" size="10" maxlength="20" /></td>
      </tr>
      <tr>
        <td>������:</td>
        <td><input type="password" name="password1" size="10" maxlength="20" /></td>
      </tr>
      <tr>
        <td>ȷ��������: </td>
        <td><input type="password" name="password2" size="10" maxlength="20" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="Submit" value="�޸�" />
        </div></td>
      </tr>
    </table>
</form>
<?php
include ('./includes/footer.html');
?>