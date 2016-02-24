<?php 
if (isset($_POST['Submit'])) {
	$errors = array(); 
	if (empty($_POST['email'])) {
		$errors[] = '您忘记输入您的EMAIL地址.';
	} 
	if (empty($_POST['password'])) {
		$errors[] = '您忘记输入密码.';
	} 
	
	if (empty($errors)) { 
		require_once("./includes/mysql_connect.php");
		mysql_query("SET NAMES 'gb2312'");
		$query = "SELECT user_id, name FROM users WHERE email='{$_POST['email']}' AND password=SHA('{$_POST['password']}')";		
		$result = @mysql_query ($query); 
		$row = mysql_fetch_array ($result, MYSQL_NUM); 
		if ($row) { 
			session_start();
			$_SESSION['user_id'] = $row[0];
			$_SESSION['name'] = $row[1];
			$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
			
			$url = 'loggedin.php';
			header("Location: $url");
			exit(); 
				
		} else { 
			$errors[] = '对不起，您输入的电子邮件地址与密码有误。'; 
		}
	mysql_close();
	}

} else { 
	$errors = NULL;
} 
$page_title = '登录';
include ('./includes/header1.0.html');

if (!empty($errors)) { 
	echo '<h1 id="mainhead">错误！</h1>
	<p class="error">出现以下错误：<br />';
	foreach ($errors as $msg) { // Print each error.
		echo " - $msg<br />\n";
	}
	echo '</p><p>请重填：</p>';
}

?>
<h2>登录</h2>
<form action="login.php" method="post">
	<table width="296" height="75">
      <tr>
      <tr>
        <td>Email地址:</td>
        <td><input type="text" name="email" size="20" maxlength="40" /></td>
      </tr>
      <tr>
        <td>密码:</td>
        <td><input type="password" name="password" size="20" maxlength="20" /></td>
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