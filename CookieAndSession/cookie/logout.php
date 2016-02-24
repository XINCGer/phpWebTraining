<?php # Script 10-3 - logout.php
if (!isset($_COOKIE['user_id'])) {

	$url = 'index.php'; 
	header("Location: $url");
	exit(); 

} else { 
	setcookie ('name','');
	setcookie ('user_id','');
}

$page_title = '注销';
include ('./includes/header.html');

echo "<h1>注销</h1>
<p>您已注销成功。{$_COOKIE['name']}!</p>
<p><br /><br /></p>";

include ('./includes/footer.html');
?>