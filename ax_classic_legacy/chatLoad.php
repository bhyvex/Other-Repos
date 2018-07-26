<?php
session_start();
 require("./mysql/mysql.php");
 
 if(isset($_POST["text"]) && isset($_SESSION["username"])) {
	$_SESSION['last_action'] = time(); 
	//$text = mb_convert_encoding($_POST["text"], "HTML-ENTITIES", "UTF-8");
	$text = htmlentities(mysqli_real_escape_string($con, $_POST["text"]));
	 
	 $timestamp = time();
	 $username = $_SESSION["username"];
	 $query = "INSERT INTO text (username, chattext, timestamp) VALUES ('$username', '$text', '$timestamp')";
	 $result = mysqli_query($con, $query);

	 $query2 = "UPDATE chatbox SET last_visit='$timestamp' WHERE username='$username'";
	 $result2 = mysqli_query($con, $query2);
 }
 // outputting text to box
 $querys = "SELECT username, chattext, timestamp FROM text";
 $results = mysqli_query($con, $querys);
 while($row = mysqli_fetch_array($results)) {
	 $datetime = date("F j Y l g:ia", $row["timestamp"]);
	 echo "[" . $datetime . "] &lt;<span style='font-weight:bold'>" . $row["username"] . "</span>&gt;: " . stripslashes($row["chattext"]) . "<br/>";
	 //echo "[" . $datetime . "] " . $row["username"] . ": " . $row["chattext"] . "<br/>";
	 //echo $row["username"] . ": " . $row["chattext"] . "<br/>";
 }
?>