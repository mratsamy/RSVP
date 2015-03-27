<?php
    
    //checks to see if the user is logged in
    session_start();

    if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    header ("Location: ../index.php");
    }

    if($_SESSION['timer']+15*60 < time()){
        unset($_SESSION['login']);
        header ("Location: ../index.php");
    }else{
        $_SESSION['timer'] = time();
    }

	$host             = "localhost";
	$dbname           = "WeddingDatabase";
	$user             = "weddingWebsite";
	$pass             = "KOq-Te}eP^HU";
	$guestsAttending  = 0;
	$totalNumOfGuests = 0;
	$guestsNo         = 0;

	try {
	  # MySQL with PDO_MYSQL
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=AllRSVPs.csv');

    $STH = $DBH->prepare(
    	"SELECT id, lastName, firstName, attending, numGuests FROM rsvpInfo ORDER BY id ASC"
    	);

    $STH->execute();
    $list = $STH->fetchAll();

    $output.= "RSVP Number, Last Name, First Name, Attending, Number of Guests\n";

    foreach($list as $item){
    	$totalNumOfGuests += $item['numGuests'];
    	if($item['attending'] == 1)
    	{
    		$item['attending'] = "YES";
    		$guestsAttending += $item['numGuests'];
    	}
    	else
    	{
    		$item['attending'] = "NO";
    		$guestsNo += $item['numGuests'];
    	}

    	$output .= $item['id'].",".$item['lastName'].",".$item['firstName'].","
    	.$item['attending'].",".$item['numGuests']."\n";
    }

    $output.=",,,,Attending =      ".$guestsAttending."\n";
    $output.=",,,,Not Attending =  ".$guestsNo."\n";
    $output.=",,,,Total RSVPs =    ".$totalNumOfGuests."\n";

    echo $output;

    header("Location:../report.php");

    }
	catch(PDOException $e) {
	    echo $e->getMessage();
	    sleep(15);
	    header("Location:../report.php");
	}