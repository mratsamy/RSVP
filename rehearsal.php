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
		<title>Rehearsal Reports</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="CSS/entry.css">
	</head>
	<body>
	<? php include 'views/navigation-menu.php'; ?>
	<div class="main">
		<form method="POST" action="PHP-scripts/rehearsalCSV.php">
			<div class="col-md-4">
				<button class="btn dlButton" name="downloads" value="ALL" onclick="location.href='PHP-scripts/rehearsalCSV.php'">Download All</button>
			</div>
			<div class="col-md-4">
				<button class="btn dlButton" name="downloads" value="YES" onclick="location.href='PHP-scripts/rehearsalCSV.php'">Download Yes</button>
			</div>
			<div class="col-md-4">
				<button class="btn dlButton" name="downloads" value="NO" onclick="location.href='PHP-scripts/rehearsalCSV.php'">Download No</button>
			</div>
		</form>
<? php include '_parcials.footer.php'; ?>