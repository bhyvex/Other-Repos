<?php
	session_start();
	require("./mysql/mysql.php");
	$username = $_SESSION["username"];
	$query = "UPDATE chatbox SET online='0' WHERE username='$username'";
	$results = mysqli_query($con, $query);
	
	//session_destroy();
	unset($_SESSION["username"]);
	unset($_SESSION["last_action"]);
	header("Location: ./index.php?editor=chat");
	die();
?>