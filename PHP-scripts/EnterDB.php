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

		$stmt = $DBH->prepare('SELECT * FROM table WHERE ID=?');
		$stmt->bindParam(1, $_POST['rsvpNumber'], PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(row){
			echo "You will be redirected";
			echo "<script>setTimeout(\"location.href = '../entry.php';\",8000);</script>";
			throw new Exception("The RSVP number already exists in the Database");
		}

	$STH->execute();
	echo "<h1>Success</h1>";
	echo "<script>setTimeout(\"location.href = '../entry.php';\",500);</script>";

	//header("Location:entry.php");
	}
	catch(PDOException $e) {
	    print_r($e->getMessage());
	    sleep(15);
	    echo "<script>setTimeout(\"location.href = '../entry.php';\",500);</script>";
	}