<!DOCTYPE html>
	<head>
		<title>Wedding RSVP Log</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="CSS/main.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js">
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	</head>

	<body>
		<div class="col-md-12 padding"></div>
		<div class="col-md-4 col-xs-1">
		</div>
		<div id="main-container" class="col-md-4 col-xs-10 text-center">
			<form class="form-signin" action="LoginCheck.php" method="POST">
				<h2>Sign In Information</h2>
				<div class="col-md-10" id="username">
					<input name="username" id="username" class="form-control" placeholder="Username" required autofocus>
					<input name="password" class="form-control" type="password" id="password" placeholder="Password">
				</div>
				<div class="col-md-12">
					<button class="btn btn-md" type="submit">ENTER</button>
				</div>
		</div>
	</body>

</html>