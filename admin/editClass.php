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
$metro = mysql_connect("localhost", "metro" , "password");
if (!$metro)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("metro.programs", $metro);
	
$programID = $_GET['programID'];

$query = "SELECT programs.* , artists.name FROM metro.programs JOIN metro.artists ON artists.artistID = programs.artistID WHERE programID = $programID";
$artistQuery = "SELECT DISTINCT artists.name, artists.artistID FROM metro.artists;";
$result = mysql_query($query,$metro) or die(mysqlerror());
$artistResult = mysql_query($artistQuery,$metro) or die(mysqlerror());
$artistRow = mysql_fetch_assoc($artistResult);

while($row = mysql_fetch_array($result))
{
	$programID = $row[0];
        $name = $row[1];
        $description = $row[6];
        $duration = $row[5];
        $thisArtist = $row[11];
        $grades = $row[3];
		$category = $row[8];   
		$supplies = $row[10];
		$greenArts = $row[9]; 
		$artistID = $artistRow[2];
}

?>

<div id="text">
    <table width="595">
    <form name="update" action="editClassProcess.php" method="POST">
    <input name="programID" type="hidden" value="<?php echo $programID; ?>" />
      <tr>
        <td width="112">Title:</td>
        <td width="471"><input name="name" type="text" id="name" size="50" value="<?php echo $name; ?>" /> </td>
            <script>
            window.onload = function() {
            document.getElementById("title").focus();
            };
            </script>
      </tr>
      <tr>
        <td height="62">Description:</td>
        <td><textarea name="description" cols="50" rows="5" ><?php echo $description; ?></textarea></td>
      </tr>
      <tr>
        <td>Duration:</td>
        <td><input name="duration" type="text" size="50" value="<?php echo $duration; ?>" /></td>
      </tr>
      <tr>
        <td>Artist:</td>
        <td><select name="artist" id="artist" style="width:200px;"> 
		<?php 
			
			do { 
			echo "<option value=".$artistRow['artistID'].">".$artistRow['name']."</option>";
			if ($artistRow['name'] == $thisArtist) {
				echo "<option value=\"".$artistRow['artistID']."\" selected>".$artistRow['name']."</option>";
			}
			
			} while($artistRow = mysql_fetch_assoc($artistResult))
		?> 
		</select> 
		</td>
      <tr>
      <tr>
        <td>Grades:</td>
        <td><input name="grades" type="text" size="50" value="<?php echo $grades; ?>" /> </td>
      <tr>
      <tr>
        <td>Category:</td>
        <td><input name="category" type="text" size="50" value="<?php echo $category; ?>" /> </td>
      <tr>
      <tr>
        <td>Supplies:</td>
        <td><input name="supplies" type="text" size="50" value="<?php echo $supplies; ?>" /> </td>
      <tr>
      <tr>
        <td>Green Arts:</td>
        <td><input name="greenArts" type="checkbox" <?php if ($greenArts == 1) echo "checked='checked'"; ?> /> </td>
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
mysql_free_result($artistResult);
?>
</body>
</html>