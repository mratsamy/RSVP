<?php
	 $username = $_POST["username"];
	 $username = htmlspecialchars($username);
	 $password = $_POST["password"];
	 $password = htmlspecialchars($password);

	if($username == "MikeAndMaresaWedding" && $password == "Wedding04182015")
	{
		session_start();
		$_SESSION['login'] = "1";
		$_SESSION['timer'] = time();
		header("Location:welcome.php");
	}
	else
	{
		$errorMessage = "Invalid Login";
		session_start();
		$_SESSION['login'] = '';
		echo "<center><h1>invalid login</h1></center>";
		echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
	}

?>