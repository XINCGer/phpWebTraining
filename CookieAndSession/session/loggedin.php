<?php 
session_start();
if(!isset($_SESSION['agent']) OR ($_SESSION ['agent'] != md5($_SERVER['HTTP_USER_AGENT']))){
	$url = 'index.php'; 
	header("Location: $url");
	exit(); 
}

$page_title = '��¼�ɹ�';
include ('./includes/header.html');

echo "<h1>��¼�ɹ�</h1>
<p>��л���ĵ�¼�� {$_SESSION['name']}!</p>
<p><br /><br /></p>";

include ('./includes/footer.html');
?>