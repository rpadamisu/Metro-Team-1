<?php
 if ($_SERVER['HTTP_HOST'] == "localhost") {
	 $serverName = "snare.arvixe.com";
 }else $serverName = "localhost";
	//creates connection
	$con = mysql_connect($serverName,"metro","password");
	//checks connection
if (!$con)
  {
   die('Could not connect to database: ' . mysql_error());
  }
?>
