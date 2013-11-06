
<?php
session_start();
include("../connection.php");

mysql_select_db("metro.users", $con);


if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	$user = $_POST['username'];
	$pass = md5($_POST['pass1']);
	
	$query = "SELECT * FROM metro.users WHERE username = '$user'";
	$result = mysql_query($query);
	$i = 0;
	if (($i > 0) && ($password == $pass))
	{
		$_SESSION['loggedIn'] = 1; 
		$_SESSION['username'] = $username;
		header("Location: home.php");
		//echo "logged in<br />";
		//echo "sess: ". $_SESSION['loggedIn'];
		
	}
	else {
		$_SESSION['loggedIn'] = 0;
		 header("Location: login.php");
		 //echo "not logged in<br />";
		 //echo "sess: ". $_SESSION['loggedIn'];
	}
}
	else header("Location: login.php");


mysql_close($con);
?>