<?php # Script 9-1 �C mysql_connect.php

$hostname = "localhost";
$database = "mydatabase";
$username = "root";
$password = "123456";

$dbc = mysql_pconnect($hostname, $username, $password) OR die ('�������ݿ�ʧ�ܣ�' . mysql_error()); 

@mysql_select_db($database) OR die ('ѡ�����ݿ�ʧ�ܣ�' . mysql_error());;
?>