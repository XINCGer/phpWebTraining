<?php # Script 3.13 - register.php
$page_title = '注册';
include ('./includes/header.html');

// Check if the form has been submitted.
if (isset($_POST['submitted'])) {

	$errors = array(); // Initialize error array.
	
	// Check for a name.
	if (empty($_POST['name'])) {
		$errors[] = '您忘记输入用户名.';
	}
	
	// Check for an email address.
	if (empty($_POST['email'])) {
		$errors[] = '您忘记输入您的EMAIL地址.';
	}

	// Check for a password and match against the confirmed password.
	if (!empty($_POST['password1'])) {
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = '两次输入密码不同.';
		}
	} else {
		$errors[] = '您忘记输入密码.';
	}
	
	if (empty($errors)) { // If everything's okay.
	
		// Register the user.
		
		// Send an email.
		$body = "谢谢您注册我们的站点！\n您的密码为： '{$_POST['password1']}'.\n\n此致,\n敬礼！";
		mail ($_POST['email'], '谢谢您的注册！', $body, 'From: shiying@zdxy.cn');
		
		echo '<h1 id="mainhead">谢谢！</h1>
		<p>您已注册成功，确认邮件已发送至您的邮箱！</p><p><br /></p>';	
		
	} else { // Report the errors.
	
		echo '<h1 id="mainhead">错误！</h1>
		<p class="error">出现以下错误：<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>请<a href="register.php">返回</a>重填</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} else { // Display the form.
?>
<h2>注册：</h2>
<form action="register.php" method="post">
	<p>用户名: <input type="text" name="name" size="20" maxlength="40" /></p>
	<p>Email地址: <input type="text" name="email" size="20" maxlength="40" /> </p>
	<p>密码: <input type="password" name="password1" size="10" maxlength="20" /></p>
	<p>确认密码: <input type="password" name="password2" size="10" maxlength="20" /></p>
	<p><input type="submit" name="submit" value="注册" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
<?php
} // Close the main IF-ELSE.
include ('./includes/footer.html');
?>