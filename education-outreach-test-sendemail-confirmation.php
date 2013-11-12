<?php
    
    
    include("/Connections/metro.php");
    include("/PHPMailer/class.phpmailer.php");
    
    if(isset($_POST['firstname']))
        $firstname = $_POST['firstname'];
        
    if(isset($_POST['lastname']))
        $lastname = $_POST['lastname'];
        
    if(isset($firstname) && isset($lastname))
        $fullname = $firstname . " " . $lastname;
        
    if(isset($_POST['school_organization']))
        $school_org = $_POST['school_organization'];
        
    if(isset($_POST['email']))
    {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
            echo "This email address is considered valid.";
        else
            echo "nope.";

    }
        
        
    if(isset($_POST['usrtel']))
    {
        $telnumber = $_POST['usrtel'];
        echo preg_match("/((\(\d{3}\))|(\d{3}-))\d{3}-\d{4}/", $telnumber);
    }
        
        
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
        
    
        
    //echo $fullname . " " . $school_org . " " . $email . " " .$telnumber . " " . $fulladdress . " " . $time_requested . " " . $date_requested;
    //echo $programTitle;
    //echo $artistName;
    
    
    
    
    mysql_select_db($database_metro, $metro);
    
//----------TEACHER INFO-------------------------- DONE-----UNCOMMENT QUERIES TO INSERT
    //Grabbing last teacherID to increment and insert teacher info into teachers table
    $query_RecordsetID = "SELECT teachers.teacherID FROM metro.teachers ORDER BY teachers.teacherID DESC LIMIT 1;";
    $RecordsetID = mysql_query($query_RecordsetID, $metro) or die(mysql_error());
    $row_RecordsetID = mysql_fetch_assoc($RecordsetID);
    $row_RecordsetID['teacherID'] += 1; //incrementing last id
    
    //inserting teacher info into teachers tables
    $query_Recordset2 = "INSERT INTO metro.teachers (teacherID, name, schoolOrg, email, phone, address) VALUES ('". $row_RecordsetID['teacherID']."', '".$fullname."', '".$school_org."', '".$email."', '".$telnumber."', '".$fulladdress."');";
    //echo $query_Recordset2;
    //$Recordset2 = mysql_query($query_Recordset2, $metro) or die(mysql_error());
//--------------------------------------------------


//---------GRABBING PROGRAM ID---------------------- DONE
    $query_RecordsetProgram = "SELECT programID FROM metro.programs WHERE programs.name = '".$programTitle."';";
    echo $query_RecordsetProgram;
    $RecordsetProgram = mysql_query($query_RecordsetProgram, $metro) or die(mysql_error());
    $row_RecordsetProgramID = mysql_fetch_assoc($RecordsetProgram);
//-------------------------------------------------


//------------EVENT INFO-------------------------- INCLUDE eventDateTime, location, roomNum, numParticipants, status, evaluationId
    //Grabbing last eventID to increment and insert event info into event table
    $query_RecordsetEventID = "SELECT events.eventID FROM metro.events ORDER BY events.eventID DESC LIMIT 1;";
    $RecordsetEventID = mysql_query($query_RecordsetEventID, $metro) or die(mysql_error());
    $row_RecordsetEventID = mysql_fetch_assoc($RecordsetEventID);
    $row_RecordsetEventID['eventID'] += 1; //incrementing last id
    
    //inserting event info into events table
    $query_RecordsetEvent = "INSERT INTO metro.events (eventID, teacherID, location, roomNum, numParticipants, eventDateTime, dateOfRequest, status, evaluationID, programID)
                            VALUES ('".$row_RecordsetEventID['eventID']."', '".$row_RecordsetID['teacherID']."', '".$location."', '".$roomNum."', '".$numParticipants."',
                            '".$eventDateTime."', '".$date_requested."', '".$status."', '".$evaluationID."', '".$row_RecordsetProgramID['programID']."');";
    echo $query_RecordsetEvent;
    //$RecordsetEveht = mysql_query($query_RecordsetEvent, $metro) or die(mysql_error());
//---------------------------------------------------------


//------------GRAB ARTIST INFO TO EMAIL-------------------- DONE
    $query_RecordsetArtistEmail = "SELECT artists.email FROM metro.artists WHERE artists.name = '".$artistName."';";
    echo $query_RecordsetArtistEmail;
    $RecordsetArtistEmail = mysql_query($query_RecordsetArtistEmail, $metro) or die(mysql_error());
    $row_RecordsetArtistEmail = mysql_fetch_assoc($RecordsetArtistEmail);
    
//---------------------------------------------------------
    
//---------EMAIL TO ********_______TEACHER__________********** FOR CONFIRMATION----------------	
$mail             = new PHPMailer();

$body             = file_get_contents('test.html');
//$body             = preg_replace('/[\]/','',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.csgarza.com"; // SMTP server
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "metroalliancewebsite@gmail.com";  // GMAIL username
$mail->Password   = "MetroPa\$\$word";            // GMAIL password

$mail->SetFrom('metroalliancewebsite@gmail.com', 'Metro Website');

$mail->AddReplyTo("metroalliancewebsite@gmail.com","Metro Website");

$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "tedmunds@iastate.edu";
$mail->AddAddress($address, "Ted");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
//-------------------------------------------------


//---------EMAIL TO **********______ARTIST_________************** FOR CONFIRMATION----------------	
$mailArtist             = new PHPMailer();

$bodyArtist             = file_get_contents('test.html');
//$body             = preg_replace('/[\]/','',$body);

$mailArtist->IsSMTP(); // telling the class to use SMTP
$mailArtist->Host       = "mail.csgarza.com"; // SMTP server
$mailArtist->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mailArtist->SMTPAuth   = true;                  // enable SMTP authentication
$mailArtist->SMTPSecure = "tls";                 // sets the prefix to the servier
$mailArtist->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mailArtist->Port       = 587;                   // set the SMTP port for the GMAIL server
$mailArtist->Username   = "metroalliancewebsite@gmail.com";  // GMAIL username
$mailArtist->Password   = "MetroPa\$\$word";            // GMAIL password

$mailArtist->SetFrom('metroalliancewebsite@gmail.com', 'Metro Website');

$mailArtist->AddReplyTo("metroalliancewebsite@gmail.com","Metro Website");

$mailArtist->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mailArtist->MsgHTML($bodyArtist);

$address = "tedmunds@iastate.edu";
$mailArtist->AddAddress($address, "Ted");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mailArtist->Send()) {
  echo "Mailer Error: " . $mailArtist->ErrorInfo;
} else {
  echo "Message sent!";
}
//-------------------------------------------------






?>