<? php

function connect(){
	global $pdo;

	$user   = "weddingWebsite";
	$pass   = "KOq-Te}eP^HU";

	$host  	= "localhost";
	$dbname	= "WeddingDatabase";	

	try{
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);	
	}catch(PDOExecption $e){
		print_r($e->getMessage());
	    sleep(15);
	    echo "<script>setTimeout(\"location.href = '../entry.php';\",500);</script>";
	}
}

function verifySession(){
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
}

function weddingGuestRsvp($id, $lastName, $firstName, $numGuests, $boolAttending){
	global $pdo;
	try{
		$statment = $pdo->prepare("INSERT INTO rsvpInfo(id, lastname, firstname, attending, numGuests) value 
				(:rsvpNumber, :lastname, :firstname, :boolAttending, :numAttending)");

		$statment->bindParam('rsvpNumber', $rsvpNumber);
		$statment->bindParam('lastname', $lastname);
		$statment->bindParam('firstname', $firstname);
		$statment->bindParam('boolAttending', $boolAttending);
		$statment->bindParam('numAttending', $numAttending);

		$statment = $pdo->prepare('SELECT * FROM table WHERE ID=?');
		$statment->bindParam(1, $_POST['rsvpNumber'], PDO::PARAM_INT);
		$statment->execute();
			$row = $statment->fetch(PDO::FETCH_ASSOC);
			if(row){
				echo "You will be redirected";
				echo "<script>setTimeout(\"location.href = '../entry.php';\",8000);</script>";
				throw new Exception("The RSVP number already exists in the Database");
			}

		$statment->execute();
		echo "<h1>Success</h1>";
		echo "<script>setTimeout(\"location.href = '../entry.php';\",500);</script>";
	}catch(PDOExecption $e){

	}
}