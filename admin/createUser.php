<?php
include("../connection.php");
$con = mysql_connect("localhost", "metro" , "password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("metro.artists", $con);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$discipline = $_POST['discipline'];
	$email = $_POST['email'];
	
	$dbname = mysql_escape_string($name);
	$dbaddress = mysql_escape_string($address);
	$dbphone = mysql_escape_string($phone);
	$dbdiscipline = mysql_escape_string($discipline);
	$dbemail = mysql_escape_string($email);

	$query = mysql_query("
	INSERT INTO metro.artists(name, address, phone, email, discipline)
				VALUES ('$dbname', '$dbaddress', '$dbphone', '$dbemail', '$dbdiscipline')
		");
	if (!$query) {
		echo "Not able to insert artist into the database. Please contact the database administrator";
		header("Refresh:2; url=home.php");	
	}
	else {
		header("Refresh:2; url=home.php");	
		echo "Artist added";
	}
	mysql_close($con);
}
else header("Location: home.php");
?>