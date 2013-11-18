<?php require_once('Connections/metro.php'); ?>
<?php mysql_select_db($database_metro, $metro);

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
<title>Education - Metro Arts Alliance</title>
<link rel="stylesheet" type="text/css" href="/css/global.css"/>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/js/standard.js"></script>


<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34803508-34']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body>
<div class="page">

<div class="head">
	<a class="logo" href="/" title="Metro Arts Alliance"></a>
	<div class="sm">
		<a class="twitter" href="https://twitter.com/MetroArts" title="Metro Arts Alliance Twitter" target="_blank">Twitter</a>
		<a class="facebook" href="https://www.facebook.com/metroartsalliance?ref=ts&fref=ts" title="Metro Arts Alliance Facebook" target="_blank">Facebook</a>
		<a class="pinterest" href="http://pinterest.com/metroarts/" title="Metro Arts Alliance Pinterest" target="_blank">Pinterest</a>
		<div class="bar"></div>
	</div>
 	 <ul id="top-menu" class="menu">
 	  <li id='top-menu-122' class='main-menu-first'><a href="/about-us/" title="About Us">About Us</a>					
		   <ul class="sub">
	 				  <li id='top-menu-130' class='sub-menu-first'><a href="/about-us/mission/" title="Mission">Mission</a></li>
					  <li id='top-menu-131'><a href="/about-us/history/" title="History">History</a></li>
					  <li id='top-menu-109'><a href="/staff/" title="Board/Staff">Board/Staff</a></li>
					  <li id='top-menu-132' class='sub-menu-last'><a href="/about-us/contact-us/" title="Contact Us">Contact Us</a></li>
		   </ul>
	   </li>
	  <li id='top-menu-123'><a href="/members/" title="Membership">Membership</a>					
		   <ul class="sub">
	 				  <li id='top-menu-127' class='sub-menu-first'><a href="/members/join/" title="Membership Application">Membership Application</a></li>
					  <li id='top-menu-133'><a href="/members/benefits/" title="Benefits">Benefits</a></li>
					  <li id='top-menu-126' class='sub-menu-last'><a href="/members/donate/" title="Donate">Donate</a></li>
		   </ul>
	   </li>
	  <li id='top-menu-134'><a href="/supporters/" title="Supporters">Supporters</a>					
		   <ul class="sub">
	 				  <li id='top-menu-138' class='sub-menu-first'><a href="/supporters/donors-list/" title="Donors List">Donors List</a></li>
					  <li id='top-menu-139' class='sub-menu-last'><a href="/supporters/sponsors-list/" title="Sponsors List">Sponsors List</a></li>
		   </ul>
	   </li>
	  <li id='top-menu-135'><a href="/programs/" title="Programs">Programs</a>					
		   <ul class="sub">
	 				  <li id='top-menu-124' class='sub-menu-first'><a href="/education-outreach.php" title="Education">Education</a></li>
					  <li id='top-menu-136'><a href="/programs/jazz-in-july/" title="Jazz in July">Jazz in July</a></li>
					  <li id='top-menu-137'><a href="/programs/rock-n-run/" title="Rock 'n Run">Rock 'n Run</a></li>
					  <li id='top-menu-144'><a href="/programs/dining-for-the-arts/" title="Dining for the Arts">Dining for the Arts</a></li>
					  <li id='top-menu-145' class='sub-menu-last'><a href="/programs/support-local-artists/" title="Support Local Artists">Support Local Artists</a></li>
		   </ul>
	   </li>
	  <li id='top-menu-108'><a href="/resources/" title="Resources">Resources</a>					
		   <ul class="sub">
	 				  <li id='top-menu-106' class='sub-menu-first'><a href="/news/" title="News">News</a></li>
					  <li id='top-menu-143'><a href="/photo-gallery/" title="Photo Gallery">Photo Gallery</a></li>
					  <li id='top-menu-112' class='sub-menu-last'><a href="/videos/" title="Videos">Videos</a></li>
		   </ul>
	   </li>
	  <li id='top-menu-118' class='main-menu-last'><a href="/calendar/events/" title="Calendar">Calendar</a>					
		  </li>
	 </ul>
 </div>
 </br>
 
 <div class="body">
 
	<div class="full">
	
		<h1 align="center">Site Contract</h1></br>
		<p align="center">Agreement by and between Metro Arts Alliance and <?php echo $schoolOrg;?>, "site", in which the site agrees to:</p>
		<p></br></p>
		<p><b>Host the following artist:</b></p>
		<p></br></p>
		<table width="75%" align="center">
		
			<tr>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">Date</th>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">Time</th>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">Artist</th>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">Program</th>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">Contact</th>
			</tr>
			
			<tr>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">
					<?php list($date, $time) = explode(' ',$eventDateTime);
					list($year, $month, $date) = explode('-', $date);
					if ($month == '01') {
						$month = "January";
					}
					elseif ($month == '02') {
						$month = "February";
					}
					elseif ($month == '03') {
						$month = "March";
					}
					elseif ($month == '04') {
						$month = "April";
					}
					elseif ($month == '05') {
						$month = "May";
					}
					elseif ($month == '06') {
						$month = "June";
					}
					elseif ($month == '07') {
						$month = "July";
					}
					elseif ($month == '08') {
						$month = "August";
					}
					elseif ($month == '09') {
						$month = "September";
					}
					elseif ($month == '10') {
						$month = "October";
					}
					elseif ($month == '11') {
						$month = "November";
					}
					else {
					$month = "December";
					}
					echo $month . " " . $date;
					?>
				</th>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">
					<?php list($date, $time) = explode(' ', $eventDateTime);
					list($hour, $min, $sec) = explode(':', $time);
					echo $hour . ":" . $min;
					?>
				</th>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">
					<?php echo $artist ?>
				</th>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">
					<?php echo $program ?>
				</th>
				<th scope="col" align ="center" width="20" style="border-bottom: 1px solid #000;">
					<?php echo $artistEmail ?>
				</th>
			</tr>
		
		</table>
	</div>

</div>
</br>
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
<div class="sponsor">
	<div class="vsi"><a href="http://www.visionary.com/solutions/website-design.html" target="_blank" title="Des Moines Custom Website Design by Visionary Services">Iowa Web design &amp; development by <strong>Visionary Services</strong></a></div>
	<div class="sponsor1"><a href="http://www.iowaartscouncil.org/" target="_blank" title="Iowa Arts Council"></a></div>
	<div class="sponsor2"><a href="http://www.bravogreaterdesmoines.org/" target="_blank" title="Bravo Greater Des Moines"></a></div>
	<div class="sponsor3"><a href="/" target="_blank" title=""></a></div>
	<div class="sponsor4"><a href="/" target="_blank" title=""></a></div>
	<div class="sponsor5"><a href="/" target="_blank" title=""></a></div>
</div>


</div>

</body>
</html>