<?php 

$hostname = "localhost";
$database = "guestbook";
$username = "testuser";
$password = "123456";

$dbc = @mysql_pconnect($hostname, $username, $password) OR die ('连接数据库失败：' . mysql_error()); 

@mysql_select_db($database) OR die ('选择数据库失败：' . mysql_error());;
?>