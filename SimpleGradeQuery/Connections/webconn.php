<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_webconn = "localhost";
$database_webconn = "phpweb";
$username_webconn = "root";
$password_webconn = "";
$webconn = mysql_pconnect($hostname_webconn, $username_webconn, $password_webconn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>