<?php # Script 3.13 - register.php
$page_title = 'ע��';
include ('./includes/header.html');

// Check if the form has been submitted.
if (isset($_POST['submitted'])) {

	$errors = array(); // Initialize error array.
	
	// Check for a name.
	if (empty($_POST['name'])) {
		$errors[] = '�����������û���.';
	}
	
	// Check for an email address.
	if (empty($_POST['email'])) {
		$errors[] = '��������������EMAIL��ַ.';
	}

	// Check for a password and match against the confirmed password.
	if (!empty($_POST['password1'])) {
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = '�����������벻ͬ.';
		}
	} else {
		$errors[] = '��������������.';
	}
	
	if (empty($errors)) { // If everything's okay.
	
		// Register the user.
		
		// Send an email.
		$body = "лл��ע�����ǵ�վ�㣡\n��������Ϊ�� '{$_POST['password1']}'.\n\n����,\n����";
		mail ($_POST['email'], 'лл����ע�ᣡ', $body, 'From: shiying@zdxy.cn');
		
		echo '<h1 id="mainhead">лл��</h1>
		<p>����ע��ɹ���ȷ���ʼ��ѷ������������䣡</p><p><br /></p>';	
		
	} else { // Report the errors.
	
		echo '<h1 id="mainhead">����</h1>
		<p class="error">�������´���<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>��<a href="register.php">����</a>����</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} else { // Display the form.
?>
<h2>ע�᣺</h2>
<form action="register.php" method="post">
	<p>�û���: <input type="text" name="name" size="20" maxlength="40" /></p>
	<p>Email��ַ: <input type="text" name="email" size="20" maxlength="40" /> </p>
	<p>����: <input type="password" name="password1" size="10" maxlength="20" /></p>
	<p>ȷ������: <input type="password" name="password2" size="10" maxlength="20" /></p>
	<p><input type="submit" name="submit" value="ע��" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
<?php
} // Close the main IF-ELSE.
include ('./includes/footer.html');
?>