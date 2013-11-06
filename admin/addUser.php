<?php
include("../connection.php");

mysql_select_db("metro.users", $con);
session_start();

$RU = ($_SERVER['REMOTE_USER']); 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{	
	$query = "SELECT username FROM metro.users WHERE username = '$user'";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{	
		?>
		<script type="text/javascript">
			alert("Username already in use");
			history.back();;
		</script>
        <?php 
	}


		$username = $_POST['username'];
		$pass = md5($_POST['pass1']);
	
		$dbusername = mysql_real_escape_string($username);
		$dbpass = mysql_real_escape_string($pass);
	
		mysql_query("
		INSERT INTO metro.users (username, password)
					VALUES ('$dbusername', '$dbpass')
			");
		mysql_close($con);
		?>
		<script type="text/javascript">
			alert("User Added");
			window.location = "home.php";
		</script> 
    <?php
}
//header("Location: home.php");
?>
