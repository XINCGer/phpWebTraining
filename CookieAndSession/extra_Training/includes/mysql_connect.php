<?php 

$hostname = "localhost";
$database = "guestbook";
$username = "testuser";
$password = "123456";

$dbc = @mysql_pconnect($hostname, $username, $password) OR die ('�������ݿ�ʧ�ܣ�' . mysql_error()); 

@mysql_select_db($database) OR die ('ѡ�����ݿ�ʧ�ܣ�' . mysql_error());;
?>