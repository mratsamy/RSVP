<!DOCTYPE html>
<html>
<head>
	<title>Enter Gift Information</title>
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
		</div>
	</div>
	<div class="col-md-3">
	</div>
	<div class="main col-md-8">
		<form id="dropdownQuery" action="#.php" method="POST">
			<div class="dropdown col-md-4">
				<button class="btn btn-default dropdown-toggle open" type="dropdown" id="lastnameLetter" data-toggle="dropdown" aria-expanded="true">
					SELECT Last Name&nbsp;<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<?php
						$alphabet = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
						foreach($alphabet as $letter){
							echo "<li role='menuitem'><a href='#' onclick='$('#letterInput').val($letter)>$letter</a></li>";
						}
						<li role="menuitem" id="dropfocus" value="true"><a href="#" onclick="$('#boolAttending').val(1);">Yes</a></li>
					?>
				</ul>
				<input id="letterInput" class="form-control" type="hidden" name="letter" />
			</div>
			<div class="col-md-4" id="list">
				<?php if(isset($guests)) :?>
				<div class="list-group">
					<?php
						foreach($guests as $gName){
							echo "<a href='#' class='list-group-item'>$gName->lastname.', '.$gName->firstname</a>";
						}
					?>
				</div>
			</div>
			<div class="col-md-8 col-xs-12" id="memo">
				<h2>Wedding Gift</h2>
				<form id="weddingGift" action='giftSubmission.php' method="POST">
					<div class="form-group">
						<textarea class="form-control" rows="10" id="giftInfo" name="stringGift">
							<?php if(isset($guests)) :?>
							<?php
								echo "$guests->gift";
							?>
						</textarea>
					</div>
					<button type="submit" class="btn" id="weddingGiftPost">Submit</button>
				</form>
			</div>
		</form>
	</div>
</body>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="JavaScript/gift.js"></script>
</html>