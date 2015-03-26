<?php
    
    //checks to see if the user is logged in
    session_start();

    if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    header ("Location: ../index.php");
    }

    if($_SESSION['timer']+15*60 < time()){
        header ("Location: ../index.php");
        unset($_SESSION['login']);
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
    $add              = NULL;

	try {
	  # MySQL with PDO_MYSQL
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	
        $name = $_POST['downloads'];

		header('Content-Type: text/csv; charset=utf-8');
        if($name == "ALL"){
		  header('Content-Disposition: attachment; filename=Rehearsals-All.csv');
        }else if($name == "YES"){
           header('Content-Disposition: attachment; filename=Rehearsals-Yes.csv'); 
        }else if($name == "NO"){
            header('Content-Disposition: attachment; filename=Rehearsals-No.csv');
        }else{
            throw exception("Button incorrect value");
        }

    $STH = $DBH->prepare(
    	"SELECT ID, lastname, firstname, attending, numGuests FROM rehearsalDinner ORDER BY id ASC"
    	);

    $STH->execute();
    $list = $STH->fetchAll();

    $output.= "RSVPs, Last Name, First Name, Attending, Number of Guests\n";

    foreach($list as $item){
    	$totalNumOfGuests += $item['numGuests'];
        $add = true;
    	if($item['attending'] == 1)
    	{
    		$item['attending'] = "YES";
    		$guestsAttending += $item['numGuests'];
            if($name=="NO")
            {
                unset($list[$item]);
                $add = false;
            }
    	}
    	else if($item['attending']==0)
    	{
    		$item['attending'] = "NO";
    		$guestsNo += $item['numGuests'];
            if($name=="YES")
            {
                unset($list[$item]);
                $add = false;
            }
    	}

        if($add){
    	$output .= $item['ID'].",".$item['lastname'].",".$item['firstname'].","
    	.$item['attending'].",".$item['numGuests']."\n";
        }
    }

    if($name!="NO"){
        $output.=",,,,Attending =      ".$guestsAttending."\n";
    }

    if($name!="YES"){
        $output.=",,,,Not Attending =  ".$guestsNo."\n";
    }

    if($name=="ALL"){        
    $output.=",,,,Total RSVPs =    ".$totalNumOfGuests."\n";
    }

    echo $output;

    header("Location:../rehearsal.php");

    }
	catch(PDOException $e) {
	    echo $e->getMessage();
	    sleep(15);
	    header("Location:../rehearsal.php");
	}

?>