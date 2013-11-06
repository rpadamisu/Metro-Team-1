<?php
include("../connection.php");
$con = mysql_connect("localhost", "metro" , "password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("metro.programs", $con);

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
        $name = $_POST['name'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $artist = $_POST['artist'];
        $grades = $_POST['grades'];
		$category = $_POST['category'];   
		$supplies = $_POST['supplies'];
		$greenArts = $_POST['greenArts'];  


		$dbname = mysql_escape_string($name);
		$dbdescription = mysql_escape_string($description);
		$dbgrades = mysql_escape_string($grades);
		$dbcategory = mysql_escape_string($category);
		$dbsupplies = mysql_escape_string($supplies);
	
		$query = mysql_query("
		INSERT INTO metro.programs(name, artistID, grades, sessions, duration, description, activeInd, category, greenArts, suppliesNeeded)
					VALUES ('$dbname', '$artist', '$dbgrades', '1', '$duration', '$dbdescription', '1', '$dbcategory', '$greenArts', '$dbsupplies')
			");
		if (!$query) {
			echo "Not able to insert create class. Please contact the database administrator";
			header("Refresh:2; url=add.php");	
		}
		else {
			header("Refresh:2; url=home.php");	
			echo "Class added";
		}
		mysql_close($con);
   
    
}
else header("home.php");
?>