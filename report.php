<? php include "_parcials/header"; ?>
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
	<? php include 'views/navigation-menu.php'; ?>
	<div class="col-md-4">
		<button class="btn dlButton" onclick='location.href="/rsvp/PHP-scripts/generateCSV.php"'>Download All</button>
	</div>
	<div class="col-md-4">
		<button class="btn dlButton" onclick="location.href='/rsvp/PHP-scripts/generateCSVYes.php'">Download Yes</button>
	</div>
	<div class="col-md-4">
		<button class="btn dlButton" onclick="location.href='/rsvp/PHP-scripts/generateCSVNo.php'">Download No</button>
	</div>
<? php include '_parcials.footer.php'; ?>