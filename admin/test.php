<?php
include("../connection.php");
$metro = mysql_connect("localhost", "metro" , "password");
if (!$metro)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("metro.artists", $metro);

$artistID = $_GET['artistID'];

$query = "SELECT artists.* FROM metro.artists WHERE artistID = '$artistID'";
$result = mysql_query($query, $metro) or die(mysql_error());

$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$business = $_POST['business'];
		$discipline = $_POST['discipline'];
		$updateQuery = "UPDATE metro.artists SET name = '$name', address = '$address', phone = '$phone', email = '$email', business = '$business', discipline = '$discipline' WHERE artistID = 1023";
		$successful = mysql_query($updateQuery, $metro) or die(mysql_error());
		if ($successful) echo "Successfully edited <b>" . $name . "'s </b> contact information"; 
		else echo "not successfull";
	
	?>