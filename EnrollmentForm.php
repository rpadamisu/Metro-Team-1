<?php

	include('Connections/metro.php');
	
	if(isset($_GET["programID"]))
		$programID = $_GET["programID"];
		
		
		
	mysql_select_db($database_metro, $metro);
	$query_RecordsetProgramName = "SELECT programs.name FROM metro.programs WHERE programID = ".$programID.";";
	$query_RecordsetArtistName = "SELECT artists.name FROM metro.programs, metro.artists WHERE artists.artistID = programs.artistID AND programs.programID = ".$programID.";";
	
	$RecordsetProgramName = mysql_query($query_RecordsetProgramName, $metro) or die(mysql_error());
	$RecordsetArtistName = mysql_query($query_RecordsetArtistName, $metro) or die(mysql_error());
	
	$row_RecordsetProgramName = mysql_fetch_assoc($RecordsetProgramName);
	$row_RecordsetArtistName = mysql_fetch_assoc($RecordsetArtistName);
	
	//$totalRows_Recordset2 = mysql_num_rows($Recordset2);
	//$totalRows_Recordset2 = mysql_num_rows($recordset2);


?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!--http://stackoverflow.com/questions/10167960/php-populate-drop-down-list-with-sql-data-->
<html lang="en">
<head>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<meta http-equiv="content-language" content="en"/>
	<link rel="icon" href="/images/favicon.png" type="image/png"/>
	<link rel="shortcut icon" href="/images/favicon.png" type="image/png"/>

	<title>Teacher Enrollment Form</title>
	<!-- <script src="../js/jquery.js"></script> -->
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	 <script src="../js/jquery.ptTimeSelect.js"></script>
	 <script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
	<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<script src="enrollmentscripts.js"></script>
	<script src="loadinggif.ajax.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/global.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery.ptTimeSelect.css">
</head>
<body>
	<?php echo "".$classTitle; ?>
	<div class="page">
	<div class="head">
	<a class="logo" href="/" title="Metro Arts Alliance"></a>
	<div class="sm">
		<a class="twitter" href="https://twitter.com/MetroArts" title="Metro Arts Alliance Twitter" target="_blank">Twitter</a>
		<a class="facebook" href="https://www.facebook.com/metroartsalliance?ref=ts&amp;fref=ts" title="Metro Arts Alliance Facebook" target="_blank">Facebook</a>
		<a class="pinterest" href="http://pinterest.com/metroarts/" title="Metro Arts Alliance Pinterest" target="_blank">Pinterest</a>
		<div class="bar"></div>
	</div>
 	 <ul id="top-menu" class="menu">
 	  <li id="top-menu-122" class="main-menu-first"><a href="/about-us/" title="About Us">About Us</a>					
		   <ul class="sub">
	 				  <li id="top-menu-130" class="sub-menu-first"><a href="/about-us/mission/" title="Mission">Mission</a></li>
					  <li id="top-menu-131"><a href="/about-us/history/" title="History">History</a></li>
					  <li id="top-menu-109"><a href="/staff/" title="Board/Staff">Board/Staff</a></li>
					  <li id="top-menu-132" class="sub-menu-last"><a href="/about-us/contact-us/" title="Contact Us">Contact Us</a></li>
		   </ul>
	   </li>
	  <li id="top-menu-123"><a href="/members/" title="Membership">Membership</a>					
		   <ul class="sub">
	 				  <li id="top-menu-127" class="sub-menu-first"><a href="/members/join/" title="Membership Application">Membership Application</a></li>
					  <li id="top-menu-133"><a href="/members/benefits/" title="Benefits">Benefits</a></li>
					  <li id="top-menu-126" class="sub-menu-last"><a href="/members/donate/" title="Donate">Donate</a></li>
		   </ul>
	   </li>
	  <li id="top-menu-134"><a href="/supporters/" title="Supporters">Supporters</a>					
		   <ul class="sub">
	 				  <li id="top-menu-138" class="sub-menu-first"><a href="/supporters/donors-list/" title="Donors List">Donors List</a></li>
					  <li id="top-menu-139" class="sub-menu-last"><a href="/supporters/sponsors-list/" title="Sponsors List">Sponsors List</a></li>
		   </ul>
	   </li>
	  <li id="top-menu-135"><a href="/programs/" title="Programs">Programs</a>					
		   <ul class="sub">
	 				  <li id="top-menu-124" class="sub-menu-first"><a href="/education-outreach.php/" title="Education">Education</a></li>
					  <li id="top-menu-136"><a href="/programs/jazz-in-july/" title="Jazz in July">Jazz in July</a></li>
					  <li id="top-menu-137"><a href="/programs/rock-n-run/" title="Rock 'n Run">Rock 'n Run</a></li>
					  <li id="top-menu-144"><a href="/programs/dining-for-the-arts/" title="Dining for the Arts">Dining for the Arts</a></li>
					  <li id="top-menu-145" class="sub-menu-last"><a href="/programs/support-local-artists/" title="Support Local Artists">Support Local Artists</a></li>
		   </ul>
	   </li>
	  <li id="top-menu-108"><a href="/resources/" title="Resources">Resources</a>					
		   <ul class="sub">
	 				  <li id="top-menu-106" class="sub-menu-first"><a href="/news/" title="News">News</a></li>
					  <li id="top-menu-143"><a href="/photo-gallery/" title="Photo Gallery">Photo Gallery</a></li>
					  <li id="top-menu-112" class="sub-menu-last"><a href="/videos/" title="Videos">Videos</a></li>
		   </ul>
	   </li>
	  <li id="top-menu-118" class="main-menu-last"><a href="/calendar/events/" title="Calendar">Calendar</a>					
		  </li>
	 </ul>
 </div>
<div class="body">
<div class="full" id="formDiv">
<span id="teacherInfoSpan">
<h1>Teacher Enrollment Form</h1>
<form id="teacherForm" method="post" action="courseConfirmation.php" >
<table id="teacherInfoTable">
	<tr>
		<td>First name: </td>
		<td><input type="text" id="firstname" name="firstname"></td>
	</tr>
	<tr>
		<td>Last name: </td>
		<td><input type="text" id="lastname" name="lastname"></td>
	</tr>
	<tr>
		<td>School/Organization: </td>
		<td><input type="text" id="schoolorg" name="school_organization"></td>
	</tr>
	<tr>
		<td>Email: </td>
		<td><input type="text" id="email" name="email"></td>
	</tr>
	<tr>
		<td>Phone: (ex: 123-456-7890) </td>
		<td><input type="text" id="phone" name="phone"></td>
	</tr>
	<tr>
		<td>Address: </td>
		<td><input type="text" id="address" name="address"></td>
	</tr>
	<tr>
		<td>City: </td>
		<td><input type="text" id="city" name="city"></td>
	</tr>
	<tr>
		<td>State: </td>
		<!-- <td><input type="text" id="state" name="state"></td> -->
		<td><select id="state" name="state">
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select></td>
	</tr>
	<tr>
		<td>ZIP: </td>
		<td><input type="text" id="zip" name="zip"></td>
	</tr>
</table>
</span>
<span id="classInfoSpan">
<h1>Class Information</h1>
<table id="classRequestedInfoTable" >
	<tr>
		<td>Time Requested: </td>
		<td><input type="text" id="time" name="time_requested"></td>
	</tr>
	<tr>
		<td>Date: </td>
		<td><input type="text" id="datepicker" name="date_requested"></td>
	</tr>
	<tr>
		<td>Location: </td>
		<td><input type="text" id="location" name="location"></td>
	</tr>
	<tr>
		<td>Room Number: </td>
		<td><input type="text" id="roomNum" name="roomNum"></td>
	</tr>
	<tr>
		<td>Number of Participants: </td>
		<td><input type="text" id="numParticipants" name="numParticipants"></td>
	</tr>
</table>
</span>
<!-- <h2>Personal Info:</h2>
<div id="personal_info">
	First name: <input type="text" id="firstname" name="firstname"><br>
	Last name: <input type="text" id="lastname" name="lastname"><br>
	School/Organization: <input type="text" name="lastname"><br>
	Phone: <input type="tel" name="usrtel"><br>
    Address: <input type="text" id="addressline" name="addressline"><br>
    City: <input type="text" id="city" name="city"><br>
    State: <input type="text" id="state" name="state">
    ZIP: <input type="text" id="zip" name="zip"><br><br>
</div> -->
<h2>Program & Artist Information</h2>

   	Title of Program Requested: <!--php script--><?php echo "<span><input style=\"display: none;\" type=\"text\" value=\"".$row_RecordsetProgramName["name"]."\" name=\"programTitle\" readonly></input>".$row_RecordsetProgramName["name"]."</span>";?><br>
	Course Artist:<!--php script--><?php echo "<span><input style=\"display: none;\" type=\"text\" value=\"".$row_RecordsetArtistName["name"]."\" name=\"artistName\" readonly></input>".$row_RecordsetArtistName["name"]."</span>";?><br>
	<br><br>
<input type="submit" onclick="loading()" id="submitButton" value="Submit" />
<input type="button" id="clearButton" value="Clear" />
</form>

</div>
</div>
<div class="foot">
  <ul id="bot-menu" class="menu">
 	  <li id="bot-menu-122" class="main-menu-first"><a href="/about-us/" title="About Us">About Us</a></li>
	  <li id="bot-menu-123"><a href="/members/" title="Membership">Membership</a></li>
	  <li id="bot-menu-134"><a href="/supporters/" title="Supporters">Supporters</a></li>
	  <li id="bot-menu-135"><a href="/programs/" title="Programs">Programs</a></li>
	  <li id="bot-menu-108"><a href="/resources/" title="Resources">Resources</a></li>
	  <li id="bot-menu-118" class="main-menu-last"><a href="/calendar/events/" title="Calendar">Calendar</a></li>
		<li><a href="/admin/" target="_blank">Admin</a></li>
 </ul>
 
 	 <div class="legal">www.MetroArts.org &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6">&nbsp; Metro Arts Alliance of Greater Des Moines &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6">&nbsp; info@MetroArts.org &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6">&nbsp; 305 East Court Avenue, Des Moines, IA 50309 &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6">&nbsp; 515.280.3222 <br> Copyright &copy; 2013 Metro Arts Alliance. All Rights Reserved.</div>
</div>
</div>
</body>
</html>