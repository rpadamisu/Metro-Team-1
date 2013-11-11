<?php
    
    include("/Connections/metro.php");
    
    if(isset($_POST['firstname']))
        $firstname = $_POST['firstname'];
    if(isset($_POST['lastname']))
        $lastname = $_POST['lastname'];
        
    if(isset($firstname) && isset($lastname))
        $fullname = $firstname . " " . $lastname;
        
    if(isset($_POST['school_organization']))
        $school_org = $_POST['school_organization'];
        
    if(isset($_POST['email']))
        $email = $_POST['email'];
        
    if(isset($_POST['usrtel']))
        $telnumber = $_POST['usrtel'];
        
    if(isset($_POST['address']))
        $address = $_POST['address'];
        
    if(isset($_POST['city']))
        $city = $_POST['city'];
    
    if(isset($_POST['state']))
        $state = $_POST['state'];
    
    if(isset($_POST['zip']))
        $zip = $_POST['zip'];
        
    if(isset($address) && isset($city) && isset($state) && isset($zip))
        $fulladdress = $address . ", " . $city . ", " . $state . ", " . $zip;
        
    if(isset($_POST['time_requested']))
        $time_requested = $_POST['time_requested'];
        
    if(isset($_POST['date_requested']))
        $date_requested = $_POST['date_requested'];
        
    if(isset($_POST['programTitle']))
        $programTitle = $_POST['programTitle'];
        
    if(isset($_POST['artistName']))
        $artistName = $_POST['artistName'];
        
    
        
    echo $fullname . " " . $school_org . " " . $email . " " .$telnumber . " " . $fulladdress . " " . $time_requested . " " . $date_requested;
    echo $programTitle;
    echo $artistName;
    
    
        
    
    //mysql_select_db($database_metro, $metro);
    //$query_Recordset2 = "SELECT programs.*  FROM metro.programs  JOIN metro.artists  ON artists.artistID = programs.artistID AND programs.activeInd = 1 ";
    
   // $Recordset2 = mysql_query($query_Recordset2, $metro) or die(mysql_error());
    
    //$row_Recordset2 = mysql_fetch_assoc($Recordset2);
    
    //$totalRows_Recordset2 = mysql_num_rows($Recordset2);
    
    mail("tedmunds@iastate.edu", "testMetro", "Test Message", "From:tedmunds@iastate.edu");

?>