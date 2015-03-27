<?php
	session_start();
	unset($_SESSION['timer']);
	unset($_SESSION['login']);
	header("Location: index.php");