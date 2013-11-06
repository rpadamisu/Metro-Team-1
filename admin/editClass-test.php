<?php
include("../connection.php");
$con = mysql_connect("localhost", "metro" , "password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("metro.programs", $con);
	
$programID = $_GET['programID'];

$query = "SELECT programs.* , artists.name FROM metro.programs JOIN metro.artists ON artists.artistID = programs.artistID WHERE programID = '$programID'";
$artistQuery = "SELECT DISTINCT artists.name FROM metro.artists";
$result = mysql_query($query,$con) or die(mysqlerror());
$artistResult = mysql_query($artistQuery,$con) or die(mysqlerror());
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
}

?>


<div id="text">
    <table width="595">
    <form name="update" action="#" method="POST" enctype="multipart/form-data">
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
			if ($artist === $thisArtist) {
				echo "<option value=\"".$artist."\" selected>".$artist."</option>";
			}
			do { 
			echo "<option value=\"".$artistRow['name']."\">".$artistRow['name']."</option>";
			
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