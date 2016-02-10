<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_gbook = "localhost";
$database_gbook = "gbook";
$username_gbook = "root";
$password_gbook = "";
$gbook = mysql_pconnect($hostname_gbook, $username_gbook, $password_gbook) or trigger_error(mysql_error(),E_USER_ERROR); 
?>