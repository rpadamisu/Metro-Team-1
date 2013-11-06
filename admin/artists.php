<?php 
session_start();

include('../Connections/metro.php'); 
if (isset($_SESSION["loggedIn"]) == 0) header("Location: login.php");

$con = mysql_connect("localhost", "metro" , "password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("metro.artists", $con);
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
<title>Add Artist</title>
<link rel="stylesheet" type="text/css" href="/css/global.css"/>

<script type="text/javascript" src="../js/jquery.js"></script>
</head>

<body>
<div id="darkenPage"></div>
<div class="page">

<div class="head">
	<a class="logo" href="/" title="Metro Arts Alliance"></a>
	<?php include("menu.php"); ?>		
 </div>

<div class="body">  
  
  <?php 
  // Retrieve all the data from the db
	$result = mysql_query("SELECT * FROM metro.artists")
	or die(mysql_error());  
	// store the records into $row
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
		$id[$i] = $row['artistID'];
		$names[$i] = $row['name'];
		$i++;
	}
  ?>
<div class="full">
<div id="newArtist">
<h1>Create a new Artist:</h1>
<form action="createUser.php" method="post" name="newArtist">
            <table width="320">
              <tr>
                <td>Name:</td>
               <td><input name="name" type="text" id="name" required /></td>
              </tr>
              <tr>
                <td>Address:</td>
               <td><input name="address" type="text" id="address" required /></td>
              </tr>
              <tr>
                <td>Phone:</td>
               <td><input name="phone" type="text" id="phone" required /></td>
              </tr>
              <tr>
                <td>Discipline:</td>
               <td><input name="discipline" type="text" id="discipline" required /></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><input name="email" type="text" id="email" required /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="submit" type="submit" value="Submit" /></td>
              </tr>
            </table>
            </form>
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

</div>

</body>
</html>






