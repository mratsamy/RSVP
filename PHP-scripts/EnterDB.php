<?php
	include "/PHP-scripts/functions.php";
	//checks if the user is logged in
	verifySession();

	$lastname     	=	$_POST['lastname'];
	$firstname    	=	$_POST['firstname'];
	$rsvpNumber   	=	$_POST['rsvpNumber'];
	$numAttending 	=	$_POST['numAttending'];
	$boolAttending	=	$_POST['boolAttending'];

	connect();
	weddingGuestRsvp($rsvpNumber, $lastname, $firstname, $numAttending, $boolAttending);