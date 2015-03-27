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

	$host        = "localhost";
	$dbname      = "WeddingDatabase";
	$user        = "weddingWebsite";
	$pass        = "KOq-Te}eP^HU";
	$totalGuests = 0;

	try {
	  # MySQL with PDO_MYSQL
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=RSVP-No.csv');

    $STH = $DBH->prepare(
    	"SELECT id, lastName, firstName, attending, numGuests FROM rsvpInfo WHERE attending=0 ORDER BY id ASC"
    	);

    $STH->execute();
    $list = $STH->fetchAll();

    $output.= "RSVP Number, Last Name, First Name, Attending, Number of Guests\n";

    foreach($list as $item){
    		$item['attending'] = "NO";
    		$totalGuests += $item['numGuests'];
    	
    	$output .= $item['id'].",".$item['lastName'].",".$item['firstName'].","
    	.$item['attending'].",".$item['numGuests']."\n";
    }
    $output.=",,,,Total= ".$totalGuests."\n";

    echo $output;

    header("Location:report.php");

    }
	catch(PDOException $e) {
	    echo $e->getMessage();
	    sleep(15);
	    header("Location:report.php");
	}