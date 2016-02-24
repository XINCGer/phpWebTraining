<?php # Script 9-7 - password.php
$page_title = '修改您的密码';
include ('./includes/header.html');
if (isset($_POST['Submit'])) {
	$errors = array(); // Initialize error array.
	if (empty($_POST['email'])) {
		$errors[] = '您忘记输入您的EMAIL地址.';
	}
	if (empty($_POST['password'])) {
		$errors[] = '您忘记输入当前的密码.';
	}
	if (!empty($_POST['password1'])) {
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = '两次输入密码不同.';
		}
	} else {
		$errors[] = '您忘记输入新密码.';
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
				echo '<h1 id="mainhead">谢谢您！</h1>
				<p>您的密码已被成功修改。</p><p><br /></p>';	
				include ('./includes/footer.html'); 
				exit();
			} else { 
				echo '<h1 id="mainhead">系统错误！</h1>
				<p class="error">很抱歉，修改密码没用成功。发生如下错误：</p>';
				echo '<p>' . mysql_error() . '</p>'; 
				include ('./includes/footer.html'); 
				exit();
			}
				
		} else { 
			echo '<h1 id="mainhead">错误！</h1>
			<p class="error">对不起，您的电子邮件地址与原来的密码不匹配。</p>';
		}
		mysql_close(); 
	} else { 
	
		echo '<h1 id="mainhead">错误：</h1>
		<p class="error">出现以下错误：<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>请重填：</p><p><br /></p>';
	} 
} 
?>
<h2>修改您的密码</h2>
<form action="password.php" method="post">
	<table width="299" height="151">
      <tr>
        <td>Email地址:</td>
        <td><input type="text" name="email" size="20" maxlength="40" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></td>
      </tr>
	  <tr>
        <td>原来的密码:</td>
        <td><input type="password" name="password" size="10" maxlength="20" /></td>
      </tr>
      <tr>
        <td>新密码:</td>
        <td><input type="password" name="password1" size="10" maxlength="20" /></td>
      </tr>
      <tr>
        <td>确认新密码: </td>
        <td><input type="password" name="password2" size="10" maxlength="20" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="Submit" value="修改" />
        </div></td>
      </tr>
    </table>
</form>
<?php
include ('./includes/footer.html');
?>