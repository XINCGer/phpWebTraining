<?php # Script 10-1 - login.php
if (isset($_POST['Submit'])) {
	$errors = array(); 
	if (empty($_POST['email'])) {
		$errors[] = '��������������EMAIL��ַ.';
	} 
	if (empty($_POST['password'])) {
		$errors[] = '��������������.';
	} 
	
	if (empty($errors)) { 
		require_once("./includes/mysql_connect.php");
		mysql_query("SET NAMES 'gb2312'");
		$query = "SELECT user_id, name FROM users WHERE email='{$_POST['email']}' AND password=SHA('{$_POST['password']}')";		
		$result = @mysql_query ($query); 
		$row = mysql_fetch_array ($result, MYSQL_NUM); 
		if ($row) { 
				
			setcookie ('user_id', $row[0]);
			setcookie ('name', $row[1]);
			$url = 'loggedin.php';
			header("Location: $url");
			exit(); 
				
		} else { 
			$errors[] = '�Բ���������ĵ����ʼ���ַ����������'; 
		}
	mysql_close();
	}

} else { 
	$errors = NULL;
} 
$page_title = '��¼';
include ('./includes/header.html');

if (!empty($errors)) { 
	echo '<h1 id="mainhead">����</h1>
	<p class="error">�������´���<br />';
	foreach ($errors as $msg) { // Print each error.
		echo " - $msg<br />\n";
	}
	echo '</p><p>�����</p>';
}

?>
<h2>��¼</h2>
<form action="login.php" method="post">
	<table width="296" height="75">
      <tr>
      <tr>
        <td>Email��ַ:</td>
        <td><input type="text" name="email" size="20" maxlength="40" /></td>
      </tr>
      <tr>
        <td>����:</td>
        <td><input type="password" name="password" size="20" maxlength="20" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="Submit" value="ע��" />
        </div></td>
      </tr>
  </table>
</form>
<?php
include ('./includes/footer.html');
?>