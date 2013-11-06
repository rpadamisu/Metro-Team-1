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
<!-- Example Comment for Commit! -->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta http-equiv="content-language" content="en"/>
<link rel="icon" href="/images/favicon.png" type="image/png"/>
<link rel="shortcut icon" href="/images/favicon.png" type="image/png"/>
<title>Add Class</title>
<link rel="stylesheet" type="text/css" href="/css/global.css"/>
<style type="text/css">
#darkenPage {
	   visibility: hidden;
	   position: absolute;
	   top: 0px;
		bottom: 0px;
		left: 0px;
		right: 0px;
		overflow: hidden;
		padding: 0;
		margin: 0;
		background-color: #000;
		filter: alpha(opacity=50);
		opacity: 0.5;
		z-index: 1000; 	
   }
   
#newArtist{
	  margin: 0; 
	  margin-left: 10%; 
	  padding-left: 5px;
	  margin-top: 15px; 
	  padding-top: 5px;
	  padding-bottom: 10px; 
	  width: 350px; 
	  height: 250px; 
	  position: absolute; 
	  background: #FBFBF0; 
	  border: solid #000000 2px; 
	  z-index: 1001; 
	  font-family: arial; 
	  visibility: hidden; 
   }
</style>
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

<script language="JavaScript" type="text/javascript">
      function newArtist(showhide){
            if(showhide == "show"){
                document.getElementById('newArtist').style.visibility="visible";
                document.getElementById('darkenPage').style.visibility="visible";
                window.focus();
            }else if(showhide == "hide"){
                document.getElementById('newArtist').style.visibility="hidden"; 
                document.getElementById('darkenPage').style.visibility="hidden";
            }
      }
  </script>
  
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
        <h1>Add a class here:</h1>
        <p>
            <form action="addClassToDB.php" method="POST" name="addClass">
            <table width="458">
              <tr>
                <td width="97">Title:</td>
                <td width="349"><input name="name" type="text" id="name" required /></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name="description" id="description" /> </textarea></td>
              </tr>
              <tr>
                <td>Duration:</td>
                <td><input name="duration" type="text" id="duration" required /></td>
              </tr>
              <tr>
                <td>Artist:</td>
                <td><select name="artist" size="1" id="artist" required >
                        <option></option>
                        <?php
						for ($c = 0; $c < $i; $c++) {
						echo "<option value=". $id[$c] .">". $names[$c] ."</option>";	
						}
						?>
                    </select>
                    &nbsp;<a href="javascript:newArtist('show');">Create Artist</a>   
              </td>
              </tr>
              <tr>
                <td>Grades:</td>
                <td><input name="grades" type="text" id="grades"  required /></td>
              </tr>
              <tr>
                <td>Category:</td>
                <td><select name="category" size="1" id="category" required >
                        <option value="NULL">Select Category</option>
                        <option value="Visual Arts">Visual Arts</option>
                        <option value="Music">Music</option>
                        <option value="Performance">Performance</option>
                        <option value="Storytelling">Storytelling</option>
                        <option value="Writing">Writing</option>
                	</select>        
               </td>
               <tr>
                <td>Supplies Needed:</td>
                <td><textarea name="supplies" id="description" /> </textarea></td>
              </tr>  
               <tr>
                <td>Green Arts:</td>
                <td><input name="greenArts" type="checkbox" value="1"  /></td>
              </tr>          
              <tr>
                <td>&nbsp;</td>
                <td><input name="submit" type="submit" value="Submit" /></td>
              </tr>
            </table>
            </form>
		</p>
</div>



<div id="newArtist">
Create a new Artist:
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
            <center><a href="javascript:newArtist('hide');">close</a></center>
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






