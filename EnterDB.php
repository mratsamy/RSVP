<?php

	session_start();
	$lastname     	=	$_POST['lastname'];
	$firstname    	=	$_POST['firstname'];
	$rsvpNumber   	=	$_POST['rsvpNumber'];
	$numAttending 	=	$_POST['numAttending'];
	$boolAttending	=	$_POST['boolAttending'];

	$user   = "weddingWebsite";
	$pass   = "KOq-Te}eP^HU";

	$host  	= "localhost";
	$dbname	= "WeddingDatabase";	

	try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

		$STH = $DBH->prepare("INSERT INTO rsvpInfo(id, lastname, firstname, attending, numGuests) value 
			(:rsvpNumber, :lastname, :firstname, :boolAttending, :numAttending)");
		$STH->bindParam('rsvpNumber', $rsvpNumber);
		$STH->bindParam('lastname', $lastname);
		$STH->bindParam('firstname', $firstname);
		$STH->bindParam('boolAttending', $boolAttending);
		$STH->bindParam('numAttending', $numAttending);

	$STH->execute();
	echo "<h1>Success</h1>";
	echo "<script>setTimeout(\"location.href = 'entry.php';\",500);</script>";

	//header("Location:entry.php");
	}
	catch(PDOException $e) {
	    print_r($e->getMessage());
	    sleep(15);
	    header("Location:entry.php");
	}