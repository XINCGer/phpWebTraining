<?php # Script 9-3 - register.php
$page_title = 'ע��';
include ('./includes/header.html');

if (isset($_POST['Submit'])) {
	$errors = array(); 	
	if (empty($_POST['name'])) {
		$errors[] = '�����������û���.';
	}
	if (empty($_POST['email'])) {
		$errors[] = '��������������EMAIL��ַ.';
	}
	if (!empty($_POST['password1'])) {
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = '�����������벻ͬ.';
		}
	} else {
		$errors[] = '��������������.';
	}
	
	if (empty($errors)) {
		require_once("./includes/mysql_connect.php");
		$sql = "INSERT INTO `users` ( `user_id` , `name` , `password`, `email` , `registration_date`) 
				VALUES (NULL , '{$_POST['name']}', SHA1( '{$_POST['password1']}' ) , '{$_POST['email']}', NOW( ));";
		mysql_query("SET NAMES 'gb2312'");
		$result = @mysql_query($sql);
		
		if($result){
			//$body = "лл��ע�����ǵ�վ�㣡\n���ĵ�¼����Ϊ��{$_POST['password1']}";
			//mail ($_POST['email'], 'лл����ע�ᣡ', $body, 'From: shiying@zdxy.cn');
			echo '<h1 id="mainhead">ע��ɹ���</h1>';
			echo "<p>лл��ע�����ǵ�վ�㣡\n���ĵ�¼����Ϊ��{$_POST['password1']}</p>";
			echo '<p>����ע��ɹ���ȷ���ʼ��ѷ������������䣡</p><p></p>';	
			include ('./includes/footer.html');
			exit();
		}else{
			echo '<h1 id="mainhead">ϵͳ����</h1>
			<p class="error">�ܱ�Ǹ����ʱ�޷�ע�ᡣ<br />';
			echo '<p>' . mysql_error() ;
			include ('./includes/footer.html');
			exit();
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
<h2>ע�᣺</h2>
<form action="register1.0.php" method="post">
	<table width="299" height="151">
      <tr>
        <td>�û���: </td>
        <td><input type="text" name="name" size="20" maxlength="40" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" /></td>
      </tr>
      <tr>
        <td>Email��ַ:</td>
        <td><input type="text" name="email" size="20" maxlength="40" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></td>
      </tr>
      <tr>
        <td>����:</td>
        <td><input type="password" name="password1" size="10" maxlength="20" /></td>
      </tr>
      <tr>
        <td>ȷ������: </td>
        <td><input type="password" name="password2" size="10" maxlength="20" /></td>
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