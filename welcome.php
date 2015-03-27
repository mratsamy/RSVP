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
	
	<?php
	date_default_timezone_set("America/Los_Angeles");
	$date = strtotime("April 18, 2015 4:30 PM");
	$remaining = $date - time();
	$days_remaining = floor($remaining / 86400);
	$hours_remaining = floor(($remaining % 86400) / 3600);
	?>
	<center><h1>Only <?php if($days_remaining>0){echo $days_remaining;}else{echo 0;}?> days and <?php if($hours_remaining>0)
	{echo $hours_remaining;}else{echo 0;}?> hours left until the Wedding!!!!</h1></center>

<? php include '_parcials.footer.php'; ?>