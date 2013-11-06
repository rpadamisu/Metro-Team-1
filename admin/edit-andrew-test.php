<?php 
session_start();

include('../Connections/metro.php'); 
if (isset($_SESSION["loggedIn"]) == 0) header("Location: login.php");
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_metro, $metro);
$query_Recordset = "SELECT programs.*  FROM metro.programs  JOIN metro.artists  ON artists.artistID = programs.artistID";
$query_Update1 = "UPDATE metro.programs SET programs.activeInd = 0 WHERE programs.programID = ";
$query_Update2 = "UPDATE metro.programs SET programs.activeInd = 1 WHERE programs.programID = ";
$Recordset = mysql_query($query_Recordset, $metro) or die(mysql_error());
$row_Recordset = mysql_fetch_assoc($Recordset);

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
<title>Edit Class</title>
<link rel="stylesheet" type="text/css" href="/css/global.css"/>


</head>

<body>
<div class="page">

<div class="head">
	<a class="logo" href="/" title="Metro Arts Alliance"></a>
	<?php include("menu.php"); ?>		
 </div>

<div class="body">
		<div class="full">
        <h1>Edit a class here:</h1>
        <p></br></p>
		<p style="color:#e31b23;text-align:center;">
			<?php 
				if(isset($_POST['submit1']))
				{
					$id1 = $_POST['id1'];
					$pname1 = $_POST['name1'];
					$query_Update1 .= $id1;
					mysql_query($query_Update1, $metro);
					echo "The program <b>" . $pname1 .  "</b> has been deactivated";
				}
				if(isset($_POST['submit2']))
				{
					$id2 = $_POST['id2'];
					$pname2 = $_POST['name2'];
					$query_Update2 .= $id2;
					mysql_query($query_Update2, $metro);
					echo "The program <b>" . $pname2 .  "</b> has been reactivated";
				}
			?>
		</p>
        <table width="100%"align="left">
          <tr ><?php do { ?>
            <th scope="col" align="left" width="60%" style="border-bottom: 1px solid #000;"><?php echo $row_Recordset['name']; ?></th>
            <th scope="col" align="right" width="10%" style="border-bottom: 1px solid #000;"><a href="editClass.php?programID=<?php echo $row_Recordset['programID']; ?>">Edit</a></th>
            <th scope="col" align="right" width="10%" style="border-bottom: 1px solid #000;">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<input type="hidden" name="id1" value="<?php echo $row_Recordset['programID']; ?>">
					<input type="hidden" name="name1" value="<?php echo $row_Recordset['name']; ?>">
					<input type="submit" name="submit1" value="Delete">
				</form>	
			</th> 
			<th scope="col" align="right" width="10%" style="border-bottom: 1px solid #000;">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<input type="hidden" name="id2" value="<?php echo $row_Recordset['programID']; ?>">
					<input type="hidden" name="name2" value="<?php echo $row_Recordset['name']; ?>">
					<input type="submit" name="submit2" value="Reactivate">
				</form>	
			</th> 
            </tr>
            <?php } while ($row_Recordset = mysql_fetch_assoc($Recordset)); ?>
         
        </table>
        <p>		</p>
  </div>



  <p>&nbsp;</p>
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
<?php
mysql_free_result($query_Recordset);
mysql_free_result($query_Update1);
mysql_free_result($query_Update2);

?>
