<?php require_once('Connections/metro.php'); ?>
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
$query_Recordset2 = "SELECT programs.* , artists.name FROM metro.programs  JOIN metro.artists  ON artists.artistID = programs.artistID AND programs.activeInd = 1 ";
$query_Recordset3 = "SELECT DISTINCT programs.category FROM metro.programs";
$Recordset2 = mysql_query($query_Recordset2, $metro) or die(mysql_error());
$Recordset3 = mysql_query($query_Recordset3, $metro) or die(mysql_error());
$row_Recordset2 = mysql_fetch_array($Recordset2);
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
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
<style type="text/css">
#classesOffered {
	position: inherit;
	left: 5px;
	margin-top: 15px;
	width: 949px;
	height: 100%;
	z-index: 1;
}
.longDescription {
	display: none
}
.visualArts {color: #1b70e3; }
.music {color: #991be3;}
.performance {color: #e3a81b;}
.storytelling {color: #30e31b; }
.writing {color: #d7e31b;}
</style>
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
<script type="text/javascript">
	$(document).ready(function(){
		$(".expandButton").click(function () {
			var number = $(this).attr("id");
			//alert(number);
			var newNumber = number.substring(6);
			//alert(newNumber);
			$("#long"+newNumber).slideToggle();
		})
	})
	
	function toggleGreenLeaf()
	{
	    var checkBox = document.getElementById("greenLeafCheckBox");
	    if(checkBox.checked)
	    {
	      //do some DOM stuff to move thru and find green leafs
	      //hide all classes then only display green leafs
	      $(".fullClass").hide();
	      var classArray = $(".fullClass").children("span");
	      
	      var id = ""
	      for(var i = 0; i < classArray.length; i++)
	      {
		 if(classArray[i].innerHTML=="green")
		 {
		     id = classArray[i].id;
		     id = id.substring(5);
		     
		    // document.getElementById("fullClass"+id).display="inline";
		     $("#fullClass"+id).show();
		   
		 }
	      }
	      
	    }
	    else
	    {
	      $(".fullClass").show();
	    }
	}
</script>
<script type='text/javascript'>
	window.onload = function(){
		document.getElementById('sort').selectedIndex = -1;
	}	
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

<div class="body">
		<div class="full">
			<a href="http://metro.dev.csgarza.com/education-outreach.php" style="color:#e31b23;font-size:20px">Education</a>
  
<p><p style="text-align: left;">To request a program, contact Emily Saunders, Education Coordinator, by email: emily @ metroarts.org or by phone at 515-280-3222.&nbsp;</p>
<h3 style="text-align: left;"><span style="color: #e53219;">Printable PDF</span> of: &nbsp;<a title="Printable PDF" href="/documents/cms/docs/Printable_Program_Listing.pdf">Metro Arts Education program listing</a> &nbsp;</h3>
<p align="center"><img src="images/greenArtsLogo.JPG" /> Indicates a Green Arts Program, for which funding is available.</p>
<p>
	<form action="sorted.php" method="get">
	<select name="sortedClasses" id="sort">
	<?php 
		do{
			if ($row_Recordset3['category'] == 'Visual Arts') 
			echo "<option class='visualArts' value=\"".$row_Recordset3['category']."\">".$row_Recordset3['category']."</option>";
			else if ($row_Recordset3['category'] == 'Music') 
			echo "<option class='music' value=\"".$row_Recordset3['category']."\">".$row_Recordset3['category']."</option>";
			else if ($row_Recordset3['category'] == 'Performance') 
			echo "<option class='performance' value=\"".$row_Recordset3['category']."\">".$row_Recordset3['category']."</option>";
			else if ($row_Recordset3['category'] == 'Storytelling') 
			echo "<option class='storytelling' value=\"".$row_Recordset3['category']."\">".$row_Recordset3['category']."</option>";
			else if ($row_Recordset3['category'] == 'Writing') 
			echo "<option class='writing' value=\"".$row_Recordset3['category']."\">".$row_Recordset3['category']."</option>";
		else echo "<option value=\"".$row_Recordset3['category']."\">".$row_Recordset3['category']."</option>";
		}while($row_Recordset3 = mysql_fetch_assoc($Recordset3))
	?>
	</select>
    <input type="submit" />
	</form>
	
	<div>
	  <label for="greenLeafCheckBox" >Click this button to only show Green Leaf Programs</label>
	  <input id="greenLeafCheckBox" type="checkbox" onclick="toggleGreenLeaf()" />
	</div>
	
<p/>

<div id="classesOffered">
<p>&nbsp;</p>
	<?php $count = 1; ?>
  <?php do { ?>
  <?php if($row_Recordset2['category']==$_GET["sortedClasses"]){ ?>
  <div class="fullClass" id="fullClass<?php echo $count; ?>">
  <span id ="green<?php echo $count; ?>" style="display: none"><?php if ($row_Recordset2['greenArts'] == '1') echo 'green'; else echo 'notgreen'; ?></span>
  <div class="shortDescription" id="short"<?php echo $count;?>>
  <h1 style="<?php if($row_Recordset2['category'] == 'Visual Arts') { 
	echo 'color:#1b70e3;' ;
	  }
	  elseif($row_Recordset2['category'] == 'Music'){
	  echo 'color:#991be3;' ;
	  }
	  elseif($row_Recordset2['category'] == 'Performance'){
	  echo 'color:#e3a81b;' ;
	  }
	  elseif($row_Recordset2['category'] == 'Storytelling'){
	  echo 'color:#30e31b;' ;
	  }
	  elseif($row_Recordset2['category'] == 'Writing'){
	  echo 'color:#d7e31b;' ;
	  }
	  else{
	  echo 'color:#e31b23;' ;
	  }
	  ?>;font-size:16px"><?php echo $row_Recordset2[1]; if ($row_Recordset2['greenArts'] == '1') echo ' <img src="images/greenArtsLogo.JPG" /> '; ?></h1>
  <a class="expandButton" id="button<?php echo $count;?>" >Click here to see more Info.</a>
  <h2 style="font-size:14px"><?php echo "Grades:" . " " . $row_Recordset2['grades'];?><br /><?php echo "Duration:" . " " . $row_Recordset2['duration'] . " minutes"; ?></h2>
  </div>
  <div class="longDescription" id="long<?php echo $count;?>">
  <h2 style="font-size:14px"><?php echo "Teaching Artist:" . " " . $row_Recordset2[11]; ?><br /><?php echo "Supplies Needed:" . " "?>
	<?php
		if(!$row_Recordset2['suppliesNeeded'])
		{
			echo "None";
		}
		else
		{
			echo $row_Recordset2['suppliesNeeded'];
		}
	?>	
	</h2>
  <p><?php echo $row_Recordset2['description']; ?></p>
  <a align="right" href="http://metro.dev.csgarza.com/EnrollmentForm-test-passclass.php?<?php echo urlencode($row_Recordset2[1]);?>" method="GET">Click to Register</a>
  </div>
  <hr /> 
  </div>
  <?php $count++; ?>
  <?php } ?>
  <?php } while ($row_Recordset2 = mysql_fetch_array($Recordset2)); ?>
</div>



<p><span style="color: #e4361a;">Printable PDF</span> of: &nbsp;<a title="Printable listing" href="/documents/cms/docs/Printable_Program_Listing.pdf">Metro Arts Education program listing</a></p>
<p>Apply to be a New Teaching Artist:&nbsp;&nbsp;<a href="/documents/cms/docs/Teaching_Artist_Application.pdf">Teaching Artist Application</a>&nbsp;&&nbsp;<a href="/documents/cms/docs/Arts_Education_Program_Proposal.pdf">Program Proposal</a></p>
<div class="page" title="Page 2">
<div class="layoutArea">
<div class="column">
<p>To request a program, contact Emily Saunders, Education Coordinator, by email: emily @ metroarts.org or by phone at 515-280-3222.&nbsp;</p>
</div>
<div>&nbsp;Education Sponsors:</div>
<div><img src="/images/Principal.jpg" alt="" width="110" height="65" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <img src="/images/john_deere_logo.jpg" alt="" width="98" height="71" />&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <img src="/images/DMPS_color_logo.jpg" alt="" width="138" height="58" />&nbsp; &nbsp;&nbsp; &nbsp; <img src="/images/IowaArtsCouncilLogo.jpg" alt="" width="80" height="85" />&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <img style="vertical-align: baseline;" src="/images/reap_color.jpg" alt="" width="100" /> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <img src="http://img600.imageshack.us/img600/6100/zrt2.jpg" alt="" width="68" height="83" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src="http://img708.imageshack.us/img708/6161/v617.jpg" alt="" width="75" height="83" /> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>
<div>&nbsp;</div>
</div>
</div></p>

		</div>
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
<?php
mysql_free_result($Recordset2);
?>
