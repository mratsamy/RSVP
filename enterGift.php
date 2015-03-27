<? php include "_parcials/header"; ?>
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
	<? php include 'views/navigation-menu.php'; ?>
	<div class="col-md-3">
	</div>
	<div class="main col-md-8">
			<div class="dropdown col-md-4">
				<label>SELECT FIRST LETTER OF LAST NAME</label>
				<button class="btn btn-default dropdown-toggle open" type="dropdown" id="lastnameLetter" data-toggle="dropdown" aria-expanded="true">
					Last Name&nbsp;<span class="caret"></span>
				</button>
				<ul class="dropdown-menu scrollable-menu" role="menu">
					<?php
						$alphabet = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
						foreach($alphabet as $letter){
							echo "<li role='menuitem'><a href='#' onclick='$('#letterInput').val($letter);'>$letter</a></li>";
						}
					?>
				</ul>
			</div>
		<form id="dropdownQuery" action="PHP-scripts/weddingGiftDB.php" method="POST">
				<input id="letterInput" class="form-control" type="hidden" name="letter" value="" />
		</form>

	</div>
	<script type="text/javascript" src="JavaScript/gift.js"></script>
<? php include '_parcials.footer.php'; ?>