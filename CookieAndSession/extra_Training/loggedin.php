<?php 
session_start();
if(!isset($_SESSION['agent']) OR ($_SESSION ['agent'] != md5($_SERVER['HTTP_USER_AGENT']))){
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