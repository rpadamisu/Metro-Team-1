<?php

include("../connection.php");
$metro = mysql_connect("localhost", "metro" , "password");
if (!$metro)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("metro.artists", $metro);

echo '<head>
<meta http-equiv="refresh" content="2; URL=editArtist.php">
</head>';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
$artistID = $_POST['artistID'];	
$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$business = $_POST['business'];
		$discipline = $_POST['discipline'];
		
		$updateQuery = "UPDATE metro.artists SET name = '$name', address = '$address', phone = '$phone', email = '$email', business = '$business', discipline = '$discipline' WHERE artistID = '$artistID'";
		$successful = mysql_query($updateQuery, $metro) or die(mysql_error());
		if ($successful) echo "Successfully edited <b>" . $name . "'s </b> contact information. If page does not redirect you in 5 seconds please click here: <a href='editArtist.php'>Edit Artist</a>"; 
		else echo "not successful";
}
else header("Location: editArtist.php");
	?>