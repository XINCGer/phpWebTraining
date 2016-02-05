<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_vote = "localhost";
$database_vote = "vote";
$username_vote = "root";
$password_vote = "";
$vote = mysql_pconnect($hostname_vote, $username_vote, $password_vote) or trigger_error(mysql_error(),E_USER_ERROR); 
?>