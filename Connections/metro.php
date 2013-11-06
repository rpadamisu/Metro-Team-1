<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
if ($_SERVER['HTTP_HOST'] == "localhost") {
	 $serverName = "snare.arvixe.com";
 }else $serverName = "localhost";
 
$hostname_metro = $serverName;
$database_metro = "metro";
$username_metro = "metro";
$password_metro = "password";
$metro = mysql_pconnect($hostname_metro, $username_metro, $password_metro) or trigger_error(mysql_error(),E_USER_ERROR); 
?>