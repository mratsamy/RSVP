<head>
	<title>Enter Rehearsal Guest</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/rehearsalRSVP.css">
</head>
<body>
	<?php include 'views/navigation-menu.php'; ?>
	<div class="col-md-3">
	</div>
	<div class="main col-md-8">
		<form action="PHP-scripts/EnterRehearsal.php" method="POST">
			<div class="col-md-5">
				<input autofocus id="lastName" name="lastname" required  class="form-control" placeholder="Last Name" />
			</div>
			<div class="col-md-5">
				<input id="firstName" name="firstname" required class="form-control" placeholder="First Name" />
			</div>
			<div class="col-md-5">
				<input id="numGuests" name="numGuests" required class="form-control" placeholder="Number of Guests" />
			</div>
			<div class="col-md-5 dropdown">
				<button id="dropdownButton" class="form-control btn dropdown-toggle btn-default open" data-toggle="dropdown" type="button">
					Attending&nbsp;<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
				    <li role="menuitem" id="dropfocus" value="true"><a href="#" onclick="$('#boolAttending').val(1);">Yes</a></li>
				    <li role="menuitem" value="false"><a href="#" onclick="$('#boolAttending').val(0);">No</a></li>
				</ul>
			</div>
			<div class="col-md-5 col-xs-12 pull-left">
				<input id="boolAttending" name="boolAttending" type="hidden" class="form-control" name="boolAttending" />
				<button type="submit" class="btn" id="addEntry" >Add Attendee</button>
			</div>
		</form>
	</div>
</body>
<?php include '_parcials/projectLibraries.php'; ?>
<script type="text/javascript" src="JavaScript/rehearsalRSVP.js"></script>