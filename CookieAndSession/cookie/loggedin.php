<?php # Script 10-2 - loggedin.php
if (!isset($_COOKIE['user_id'])) {
	$url = 'index.php'; 
	header("Location: $url");
	exit(); 
}

$page_title = '��¼�ɹ�';
include ('./includes/header.html');

echo "<h1>��¼�ɹ�</h1>
<p>��л���ĵ�¼�� {$_COOKIE['name']}!</p>
<p><br /><br /></p>";

include ('./includes/footer.html');
?>