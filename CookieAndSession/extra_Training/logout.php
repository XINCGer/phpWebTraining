<?php # Script 11-7 - logout.php
session_start(); 
if (!isset($_SESSION['user_id'])) {

	$url = 'index.php'; 
	header("Location: $url");
	exit(); 

} else { 
	$_SESSION = array(); 
	session_destroy(); 
	setcookie ('PHPSESSID', ''); 
}

$page_title = '注销';
include ('./includes/header.html');

echo "<h1>注销</h1>
<p>您已注销成功。</p>
<p><br /><br /></p>";

include ('./includes/footer.html');
?>