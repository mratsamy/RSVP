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
		<h1>Reporting Data</h1>
		<div class="btn-group" role="group"	aria-label="">
			<a type="button" class="btn btn-default" href="welcome.php">Home</a>
			<a type="button" class="btn btn-default" href="report.php">Wedding Reports</a>
			<a type="button" class="btn btn-default" href="rehearsal.php">Rehearsal Reports</a>
			<a type="button" class="btn btn-default" href="entry.php">Enter Wedding Guest</a>
			<a type="button" class="btn btn-default" href="rehearsalRSVP.php">Enter Rehearsal Guest</a>
			<a type="button" class="btn btn-default" href="enterGift.php">Enter Wedding Gift</a>
		</div>
	</div>
	<body>
	<div class="col-md-4">
		<button class="btn dlButton" onclick='location.href="/rsvp/PHP-scripts/generateCSV.php"'>Download All</button>
	</div>
	<div class="col-md-4">
		<button class="btn dlButton" onclick="location.href='/rsvp/PHP-scripts/generateCSVYes.php'">Download Yes</button>
	</div>
	<div class="col-md-4">
		<button class="btn dlButton" onclick="location.href='/rsvp/PHP-scripts/generateCSVNo.php'">Download No</button>
	</div>
	</body>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</html>