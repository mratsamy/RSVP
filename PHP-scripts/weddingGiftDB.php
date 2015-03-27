<?php

	//checks if the user is logged in
	session_start();

	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: ../index.php");
	}

	if($_SESSION['timer']+(15*60) < time()){
		unset($_SESSION['login']);
		header ("Location: ../index.php");
	}else{
		$_SESSION['timer'] = time();
	}

	$user   = "weddingWebsite";
	$pass   = "KOq-Te}eP^HU";

	$host  	= "localhost";
	$dbname	= "WeddingDatabase";

	$letter = $_POST['letter'];

	try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

		$STH = $DBH->prepare("SELECT id, lastname, firstname FROM rsvpInfo WHERE 
		lastname LIKE ':letter%'"; 
		$STH->bindParam('letter', $letter);

	$STH->execute();
	return $STH->fetchAll(PDO::FETCH_OBJ);
	//echo "<script>setTimeout(\"location.href = '../entry.php';\",500);</script>";

	//header("Location:entry.php");
	}
	catch(PDOException $e) {
	    print_r($e->getMessage());
	    sleep(15);
	    echo "<script>setTimeout(\"location.href = '../enterGift.php';\",500);</script>";
	}