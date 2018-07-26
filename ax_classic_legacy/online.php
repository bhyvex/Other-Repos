<?php
	session_start();
	require("./mysql/mysql.php");
	echo "<span style='text-decoration:underline'>Users Online</span><br/>";
	$query = "SELECT username, last_visit, online FROM chatbox WHERE online='1'";
	$results = mysqli_query($con, $query);
	$num_cnt = mysqli_num_rows($results);
	// separate results for each query
	$online = mysqli_query($con, $query);
	$row = mysqli_fetch_array($results);

	$username = $_SESSION["username"];
	$last_visit = $row["last_visit"];
	$timestamp = time();
	$idleTime = 1800; // 12 seconds or 1800 (30 min)
	if( $num_cnt > 0 ) {
		while($rows = mysqli_fetch_array($online)) {
			echo "<span style='color:#00ff21'>@" . $rows["username"] . "</span><br/>";
		}
	} else {
		echo "&lt;Empty Room&gt;";
	}
	// do the logout idle here
	if( ($timestamp - $last_visit > $idleTime) && isset($_SESSION["username"]) ) {
		$username = $_SESSION["username"];
		$query = "UPDATE chatbox SET online='0' WHERE username='$username'";
		$results = mysqli_query($con, $query);
		unset($_SESSION["username"]);
		unset($_SESSION["last_action"]);
		session_destroy();
		echo "<script> location.href='./index.php?editor=chat'; </script>";
		exit;
	}
?>