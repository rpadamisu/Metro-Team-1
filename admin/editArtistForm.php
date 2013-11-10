<?php 
session_start();


include('../Connection.php'); 
if (isset($_SESSION["loggedIn"]) == 0) header("Location: login.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Site OnCall Version 2.9.0 -->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta http-equiv="content-language" content="en"/>
<link rel="icon" href="/images/favicon.png" type="image/png"/>
<link rel="shortcut icon" href="/images/favicon.png" type="image/png"/>
<title>Admin Home</title>
<link rel="stylesheet" type="text/css" href="/css/global.css"/>


</head>

<body>
<div class="page">

<div class="head">
	<a class="logo" href="/" title="Metro Arts Alliance"></a>
 <?php include("menu.php"); ?>			
 </div><br><br>
<?php
include("../connection.php");
$con = mysql_connect("localhost", "metro" , "password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("metro.programs", $con);

$artistID = $_GET['artistID'];

$query = "SELECT artists.* FROM metro.artists WHERE artistID = '$artistID'";
$result = mysql_query($query, $con) or die(mysql_error());

while ($row = mysql_fetch_array($result))
{
	$artistID = $row['artistID'];
	$name = $row['name'];
	$address = $row['address'];
	$phone = $row['phone'];
	$email = $row['email'];
	$business = $row['business'];
	$discipline = $row['discipline'];
}
?>

<div class="full">
<p style="color:#e31b23;text-align:center;">
<?php if(isset($_POST["submit"]))
	{
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$business = $_POST['business'];
		$discipline = $_POST['discipline'];
		$updateQuery = "UPDATE metro.artists SET name = '$name', address = '$address', phone = '$phone', email = '$email', business = '$business', discipline = '$discipline' WHERE artistID = '$artistID'";
		mysql_query($updateQuery, $con) or die(mysql_error());
		echo "Successfully edited <b>" . $name . "'s </b> contact information"; 
	}
?>
</p>
</div>
<div id="text">
    <table width="595">
    <form name="update" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
	<input name="artistID" type="hidden" value="<?php echo $artistID; ?>" />
	      <tr>
        <td width="112">Name:</td>
        <td width="471"><input name="name" type="text" id="name" size="50" value="<?php echo $name; ?>" /> </td>
            <script>
            window.onload = function() {
            document.getElementById("name").focus();
            };
            </script>
      </tr>
      <tr>
        <td>Address:</td>
        <td><input name="address" type="text" size="50" value="<?php echo $address; ?>" /></td>
      </tr>
      <tr>
        <td>Phone:</td>
        <td><input name="phone" type="text" size="50" value="<?php echo $phone; ?>" /></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input name="email" type="text" size="50" value="<?php echo $email; ?>" /> </td>
      </tr>
      <tr>
        <td>Business:</td>
        <td><input name="business" type="text" size="50" value="<?php echo $business; ?>" /> </td>
      </tr>
      <tr>
        <td>Discipline:</td>
        <td><input name="discipline" type="text" size="50" value="<?php echo $discipline; ?>" /> </td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td><input name="submit" type="submit" value="submit" /></td>
      </tr>
    </form>
    </table>
</div>
<div class="foot">
  <ul id="bot-menu" class="menu">
 	  <li id='bot-menu-122' class='main-menu-first'><a href="/about-us/" title="About Us">About Us</a></li>
	  <li id='bot-menu-123'><a href="/members/" title="Membership">Membership</a></li>
	  <li id='bot-menu-134'><a href="/supporters/" title="Supporters">Supporters</a></li>
	  <li id='bot-menu-135'><a href="/programs/" title="Programs">Programs</a></li>
	  <li id='bot-menu-108'><a href="/resources/" title="Resources">Resources</a></li>
	  <li id='bot-menu-118' class='main-menu-last'><a href="/calendar/events/" title="Calendar">Calendar</a></li>
		<li><a href="/admin/" target="_blank">Admin</a></li>
 </ul>
 
 	 <div class="legal">www.MetroArts.org &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6" />&nbsp; Metro Arts Alliance of Greater Des Moines &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6" />&nbsp; info@MetroArts.org &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6" />&nbsp; 305 East Court Avenue, Des Moines, IA 50309 &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6" />&nbsp; 515.280.3222 <br/> Copyright &copy; 2013 Metro Arts Alliance. All Rights Reserved.</div>
</div>
<?php
mysql_free_result($result);
?>
</body>
</html>