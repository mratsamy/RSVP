<?php
	//checks if the user is logged in
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

	$lastname     	=	$_POST['lastname'];
	$firstname    	=	$_POST['firstname'];
	$numGuests 	=	$_POST['numGuests'];
	$boolAttending	=	$_POST['boolAttending'];

	$user   = "weddingWebsite";
	$pass   = "KOq-Te}eP^HU";

	$host  	= "localhost";
	$dbname	= "WeddingDatabase";	

	try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

		$query = "SELECT count(*) FROM `rehearsalDinner`";
		$results = $DBH->prepare($query);
		$results->execute();
		$count = $results->fetchColumn();
		$count++;

		$STH = $DBH->prepare("INSERT INTO rehearsalDinner(ID,lastname, firstname, attending, numGuests) value 
			(:count, :lastname, :firstname, :boolAttending, :numGuests)");
		$STH->bindParam('lastname', $lastname);
		$STH->bindParam('firstname', $firstname);
		$STH->bindParam('boolAttending', $boolAttending);
		$STH->bindParam('numGuests', $numGuests);
		$STH->bindParam('count', $count);

	$STH->execute();
	echo "<h1>Success</h1>";
	echo "<script>setTimeout(\"location.href = '../rehearsalRSVP.php';\",500);</script>";

	//header("Location:entry.php");
	}
	catch(PDOException $e) {
	    print_r($e->getMessage());
	    sleep(15);
	    header("Location:../entry.php");
	}