<!DOCTYPE html>
	<head>
	<?php
		session_start();

		if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
		header ("Location: index.php");
		}

		if($_SESSION['timer']+15*60 < time()){
			unset($_SESSION['login']);
			header ("Location: index.php");
		}else{
			$_SESSION['timer'] = time();
		}
	?>
		<title>Person Attending</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="CSS/entry.css">
	</head>
	<body>
	<div class="jumbotron">
		<a class="pull-right logout" href="PHP-scripts/logout.php">Logout</a>
		<h1>Enter RSVP Data</h1>
		<div class="btn-group" role="group"	aria-label="">
			<a type="button" class="btn btn-default" href="welcome.php">Home</a>
			<a type="button" class="btn btn-default" href="report.php">Wedding Reports</a>
			<a type="button" class="btn btn-default" href="rehearsal.php">Rehearsal Reports</a>
			<a type="button" class="btn btn-default" href="entry.php">Enter Wedding Guest</a>
			<a type="button" class="btn btn-default" href="rehearsalRSVP.php">Enter Rehearsal Guest</a>
			<a type="button" class="btn btn-default" href="enterGift.php">Enter Wedding Gift</a>
		</div>
	</div>
	<div class="col-md-3">
	</div>
	<div class="col-md-8 col-xs-12">
		<form action="PHP-scripts/EnterDB.php" method="POST">
		<div class="col-md-5 col-xs-12">
		<input required autofocus id="lastname" placeholder="Last Name" class="form-control addPadding" name="lastname">
		</div>
		<div class="col-md-5 col-xs-12">
		<input required id="firstname" placeholder="First Name" class="form-control addPadding" name="firstname">
		</div>
		<div class="col-md-5 col-xs-12">
			<input id="rsvpNumber" placeholder="RSVP Number" class="form-control addPadding" name="rsvpNumber">
		</div>
		<div class="dropdown col-md-5 col-xs-12">
			<button class="btn btn-default dropdown-toggle open" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">Attending
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
			    <li role="menuitem" id="dropfocus" value="true"><a href="#" onclick="$('#boolAttending').val(1);">Yes</a></li>
			    <li role="menuitem" value="false"><a href="#" onclick="$('#boolAttending').val(0);">No</a></li>
			  </ul>
		</div>
		<div class="col-xs-12 addPadding">
		</div>
		<div class="col-md-5 col-xs-12">
		<input required id="numAttending" placeholder="Number of Attendees" class="form-control addPadding" name="numAttending">
		<input class="form-control" type="hidden" id="boolAttending" name="boolAttending">
		<button type="submit" class="btn" id="addEntry">Add Attendee</button>
		</div>
		</form>
	</div>

	</body>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="JavaScript/entry.js"></script>
</html>