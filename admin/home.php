<?php 
session_start();

if (isset($_SESSION["loggedIn"]) == 0) header("Location: login.php");
include('../Connection.php'); 
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
 </div>
<script src="../jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function()//When the dom is ready 
{
	$("#username").change(function() 
	{ //if theres a change in the username textbox

		var username = $("#username").val();//Get the value in the username textbox
		if(username.length > 3)//if the lenght greater than 3 characters
		{
			$("#availability_status").html('Checking availability...');
			//Add a loading image in the span id="availability_status"

			$.ajax({  //Make the Ajax Request
   			type: "POST",  
   			url: "ajax_check_username.php",  //file name
    		data: "username="+ username,  //data
    		success: function(server_response)
			{  
   				$("#availability_status").ajaxComplete(function(event, request)
				{ 
					if(server_response == '0')//if ajax_check_username.php return value "0"
					{ 
						$("#availability_status").html('<font color="Green"> Available </font>  ');
						//add this image to t
					}  
					else  if(server_response == '1')//if it returns "1"
					{  
	 					$("#availability_status").html('<font color="red">Not Available </font>');
					}  
   
   				});
   			} 
   
  		}); 

	}
	else
	{
		$("#availability_status").html('<font color="#cc0000">Username too short</font>');
		//if in case the username is less than or equal 3 characters only 
	}
	return false;
	});
});

</script>
<div class="body">
		<div class="full">
			<h1>Welcome <?php echo $_SESSION["username"]; ?></h1>
            <p>If you would like to add, edit, or delete a class from the database of classes offered by artists in the Des Moines area please use the links below. </p>
            <a href="add.php">Add Class</a> | <a href="edit.php">Edit Class</a> | <a href="edit.php">Delete Class</a> | <a href="editArtist.php">Edit Artists</a>
            <p>&nbsp;</p>
          <p>If you would like to add an admin account please fill out the information below.</p>
          <form action="addUser.php" method="post" name="createUser">
            <table width="319">
                  <tr>
                    <td><label for="username">Username:</label></td>
    				<td><input name="username" type="text" id="username"class="form_element" required /></td>	
                    <td><span id="availability_status"></span></td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                    <td><input name="pass1" type="password" id="pass1" required /></td>
                  </tr>
                  <tr>
                    <td>Confirm Passowrd:</td>
                    <td><input name="pass2" type="password" id="pass2" required /></td>
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

