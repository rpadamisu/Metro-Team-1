<?php

include("../connection.php");
$metro = mysql_connect("localhost", "metro" , "password");
if (!$metro)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("metro.artists", $metro);

echo '<head>
<meta http-equiv="refresh" content="2; URL=edit.php">
</head>';

if($_SERVER['REQUEST_METHOD']== "POST") {

	$programID = mysql_real_escape_string($_POST['programID']);
	$name = mysql_real_escape_string($_POST['name']);
	$description = mysql_real_escape_string($_POST['description']);
	$duration = mysql_real_escape_string($_POST['duration']);
	$artistID = mysql_real_escape_string($_POST['artist']);
	$grades = mysql_real_escape_string($_POST['grades']);
	$category = mysql_real_escape_string($_POST['category']);
	$supplies = mysql_real_escape_string($_POST['supplies']);
	$greenArts = mysql_real_escape_string($_POST['greenArts']);
	
	$updateQuery = "UPDATE metro.programs SET name = '$name', description = '$description', artistID = '$artistID', duration = '$duration', grades = '$grades', suppliesNeeded = '$supplies', greenArts = '$greenArts' WHERE programID = '$programID'";
	$successful = mysql_query($updateQuery, $metro) or die(mysql_error());
	if ($successful) echo "Successfully edited the class: <b>" . $name . "</b>. If page does not redirect you in 5 seconds please click here: <a href='edit.php'>Edit Class</a>"; 
	else echo "not successful";
	

}
else header("Location: edit.php");
?>