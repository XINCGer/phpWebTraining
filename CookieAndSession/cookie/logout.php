<?php # Script 10-3 - logout.php
if (!isset($_COOKIE['user_id'])) {

	$url = 'index.php'; 
	header("Location: $url");
	exit(); 

} else { 
	setcookie ('name','');
	setcookie ('user_id','');
}

$page_title = 'ע��';
include ('./includes/header.html');

echo "<h1>ע��</h1>
<p>����ע���ɹ���{$_COOKIE['name']}!</p>
<p><br /><br /></p>";

include ('./includes/footer.html');
?>