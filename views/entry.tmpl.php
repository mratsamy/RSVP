<head>
	<title>Person Attending</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/entry.css">
</head>
<body>
	<?php include 'views/navigation-menu.php'; ?>
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
<?php include '_parcials/projectLibraries.php'; ?>
<script type="text/javascript" src="JavaScript/entry.js"></script>