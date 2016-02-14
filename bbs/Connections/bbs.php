<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_bbs = "localhost";
$database_bbs = "bbs";
$username_bbs = "root";
$password_bbs = "";
$bbs = mysql_pconnect($hostname_bbs, $username_bbs, $password_bbs) or trigger_error(mysql_error(),E_USER_ERROR); 
?>