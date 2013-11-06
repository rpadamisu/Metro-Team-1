<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="test site/global.css"/>
<style type="text/css">
	#classes
	{
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-bottom-color: #FFF;		
	}	
</style>
</head>

<?php 
	include("connection.php");
?>
<?php 
	$queryResult = mysql_query(
	"SELECT p.name, p.grades, p.duration, p.description, a.name
	FROM programs p
	INNER JOIN artists a ON a.artistID = p.artistID
	WHERE p.activeInd = 1;", $con);
	$row = mysql_fetch_assoc($queryResult);
?>
<body>
<div class="sortFunctions">
	<?php /*this will be a form that will have a dropdown list to narrow down results by category*/ ?>
</div>
<div class="classes">	
		<?php $count = 1?>
		<?php do { ?>
			<div class="shortDescription" id="short<?php echo $count?>;"></br>
				<div class="programName"><strong> <?php echo $row['program']; ?> </strong></div>
				<div class="category"> <?php echo $row['categories']; ?> </div>
				<div class="grades"> <?php echo $row['grades']; ?> </div>
			</div>
			<div class="longDescription" id="long<?php echo $count?>;"></br>
				<div class="artistName"> <?php echo $row['name']; ?> </div>
				<div class="duration"> 
					<?php	if($row['maxDuration']=0)
							{
								echo $row['minDuration'];
							}
							else
							{
								echo $row['minDuration'] . "-" . $row['maxDuration'];
							}
					?> </div></br>
				<div class="description">
					<?php echo $row['description']; ?>
				</div>
			</div>
            <?php $count++?>
		<?php } while ($row = mysql_fetch_assoc($queryResult)); ?>
</div>
<?php mysql_close($con);?>
</body>
</html>