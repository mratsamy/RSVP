<?php
	session_start();
	unset($GLOBALS['timer']);
	unset($GLOBALS['login']);
	echo "<script>setTimeout(\"location.href = '../index.php';\",1000);</script>";