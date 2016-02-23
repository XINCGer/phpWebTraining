<?php # Script 9-3 - register.php
$page_title = '注册';
include ('./includes/header.html');

if (isset($_POST['Submit'])) {
	$errors = array(); 	
	if (empty($_POST['name'])) {
		$errors[] = '您忘记输入用户名.';
	}
	if (empty($_POST['email'])) {
		$errors[] = '您忘记输入您的EMAIL地址.';
	}
	if (!empty($_POST['password1'])) {
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = '两次输入密码不同.';
		}
	} else {
		$errors[] = '您忘记输入密码.';
	}
	
	if (empty($errors)) {
		require_once("./includes/mysql_connect.php");
		$sql = "INSERT INTO `users` ( `user_id` , `name` , `password`, `email` , `registration_date`) 
				VALUES (NULL , '{$_POST['name']}', SHA1( '{$_POST['password1']}' ) , '{$_POST['email']}', NOW( ));";
		mysql_query("SET NAMES 'gb2312'");
		$result = @mysql_query($sql);
		
		if($result){
			//$body = "谢谢您注册我们的站点！\n您的登录密码为：{$_POST['password1']}";
			//mail ($_POST['email'], '谢谢您的注册！', $body, 'From: shiying@zdxy.cn');
			echo '<h1 id="mainhead">注册成功！</h1>';
			echo "<p>谢谢您注册我们的站点！\n您的登录密码为：{$_POST['password1']}</p>";
			echo '<p>您已注册成功，确认邮件已发送至您的邮箱！</p><p></p>';	
			include ('./includes/footer.html');
			exit();
		}else{
			echo '<h1 id="mainhead">系统错误！</h1>
			<p class="error">很抱歉您暂时无法注册。<br />';
			echo '<p>' . mysql_error() ;
			include ('./includes/footer.html');
			exit();
		}
		mysql_close();
	} else { 
		echo '<h1 id="mainhead">错误！</h1>
		<p class="error">出现以下错误：<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>请重填：</p><p><br /></p>';
	} 
} 
?>
<h2>注册：</h2>
<form action="register1.0.php" method="post">
	<table width="299" height="151">
      <tr>
        <td>用户名: </td>
        <td><input type="text" name="name" size="20" maxlength="40" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" /></td>
      </tr>
      <tr>
        <td>Email地址:</td>
        <td><input type="text" name="email" size="20" maxlength="40" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></td>
      </tr>
      <tr>
        <td>密码:</td>
        <td><input type="password" name="password1" size="10" maxlength="20" /></td>
      </tr>
      <tr>
        <td>确认密码: </td>
        <td><input type="password" name="password2" size="10" maxlength="20" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="Submit" value="注册" />
        </div></td>
      </tr>
    </table>
</form>
<?php
include ('./includes/footer.html');
?>