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

$page_title = 'ע��';
include ('./includes/header.html');

echo "<h1>ע��</h1>
<p>����ע���ɹ���</p>
<p><br /><br /></p>";

include ('./includes/footer.html');
?>