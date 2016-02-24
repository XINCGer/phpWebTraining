<?php # Script 10-2 - loggedin.php
if (!isset($_COOKIE['user_id'])) {
	$url = 'index.php'; 
	header("Location: $url");
	exit(); 
}

$page_title = '登录成功';
include ('./includes/header.html');

echo "<h1>登录成功</h1>
<p>感谢您的登录， {$_COOKIE['name']}!</p>
<p><br /><br /></p>";

include ('./includes/footer.html');
?>