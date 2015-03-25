<!DOCTYPE html>
	<head>
		<?php
			session_start();

			if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
			header ("Location: index.php");
			}

			if($_SESSION['timer']+15*60 < time()){
				header ("Location: index.php");
				unset($_SESSION['login']);
			}
		?>
		<title>Enter Rehearsal Guest</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="CSS/rehearsalRSVP.css">
	</head>
	<body>
	<div class="jumbotron">
		<a class="pull-right logout" href="logout.php">Logout</a>
		<h1>Rehearsal Reports</h1>
		<div class="btn-group" role="group"	aria-label="">
			<a type="button" class="btn btn-default" href="welcome.php">Home</a>
			<a type="button" class="btn btn-default" href="report.php">Wedding Reports</a>
			<a type="button" class="btn btn-default" href="rehearsal.php">Rehearsal Reports</a>
			<a type="button" class="btn btn-default" href="entry.php">Enter Wedding Guest</a>
			<a type="button" class="btn btn-default" href="rehearsalRSVP.php">Enter Rehearsal Guest</a>
		</div>
	</div>
	<div class="col-1-md">
	</div>
	<div class="main col-10-md">
		<form action="" method="POST">
			<div class="col-5-md">
				<input id="firstName" name="firstname" required class="form-control" placeholder="First Name" value="firstname" />
			</div>
			<div class="col-5-md">
				<input id="lastName" name="lastname" required  class="form-control" placeholder="Last Name" value="lastname" />
			</div>
			<div class="col-5-md">
				<input id="numGuests" name="numGuests" required class="form-control" placeholder="Number of Guests" value="numGuests" />
			</div>
			<div class="col-5-md dropdown">
				<button id="dropdownButton" class="btn dropdown-toggle btn-default open" data-toggle="dropdown" type="button">
					Attending<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
				    <li role="menuitem" id="dropfocus" value="true"><a href="#" onclick="$('#boolAttending').val(1);">Yes</a></li>
				    <li role="menuitem" value="false"><a href="#" onclick="$('#boolAttending').val(0);">No</a></li>
				</ul>
			</div>
			<div class="col-5-md">
				<input id="boolAttending" name="boolAttending" type="hidden" class="form-control" name="boolAttending" />
				<button type="submit" class="btn" id="addEntry" >Add Attendee</button>
			</div>
		</form>
	</div>
	</body>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="JavaScript/rehearsalRSVP.js"></script>
</html>