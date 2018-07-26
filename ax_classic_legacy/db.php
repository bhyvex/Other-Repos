<?php
	session_start();
	require("./mysql/mysql.php");
	$eval = $_POST["register"];
	if( $eval == "true") {
		//echo "ok first eval is " . $eval;
		$username = mysqli_real_escape_string($con, $_POST["username"]);
		$pass = mysqli_real_escape_string($con, $_POST["password"]);
		$check = "SELECT username FROM chatbox WHERE username='$username'";
		$resultch = mysqli_query($con, $check);
		$row_cnt = mysqli_num_rows($resultch);
		if( $row_cnt > 0 ) {
			echo "Error Username exists please try again.";
		} else {
			// setting time here
			$_SESSION['last_action'] = time(); 
			$_SESSION["username"] = $username;
			$timestamp = $_SESSION['last_action'];
			$session_id = session_id();
			$query = "INSERT INTO chatbox (username, password, session_id, creation_date, last_visit) VALUES 
					('$username', '$pass', '$session_id', '$timestamp', '$timestamp')";
			$result = mysqli_query($con, $query);
			if( $result ) {
				echo "Success in registering, thank you, " . $username;
			}
		}
	} else { // just logging in
			$_SESSION['last_action'] = time(); 
			$username = $_POST["username"];
			$pass = $_POST["password"];
			$query = "SELECT username FROM chatbox WHERE username='$username'";
			$query2 = "SELECT password FROM chatbox WHERE password='$pass'";
			$result = mysqli_query($con, $query);
			$result2 = mysqli_query($con, $query2);
			$row_cnt = mysqli_num_rows($result);
			$row_cnt2 = mysqli_num_rows($result2);
			if( $row_cnt < 1 || $row_cnt2 < 1 ) {
				echo "Username and/or Password is incorrect!";
			} else {
				$_SESSION["username"] = $username;
				$timestamp = time();
				$query = "UPDATE chatbox SET online='1', last_visit='$timestamp' WHERE username='$username'";
				$results = mysqli_query($con, $query);
				echo "Sucessfully logged in, thank you " . $username;
			}
	}
	mysqli_close($con);
?>