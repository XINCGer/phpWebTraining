<?php # Script 11-6 - loggedin.php
session_start();
if (!isset($_SESSION['user_id'])) {
	$url = 'index.php'; 
	header("Location: $url");
	exit(); 
}

$page_title = '登录成功';
include ('./includes/header.html');

echo "<h1>登录成功</h1>
<p>感谢您的登录， {$_SESSION['name']}!</p>
<p><br /><br /></p>";

include ('./includes/footer.html');
?>