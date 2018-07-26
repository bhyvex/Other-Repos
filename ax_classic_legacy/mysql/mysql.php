<?php
	$HOSTNAME = "192.168.2.148"; 
	$USERNAME = "eq"; 
	$PASSWORD = "lansing222"; 
	$DATABASE = "polls";
	$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
	if( mysqli_connect_errno() ) {
		echo "Error in connecting to DB " . mysqli_connect_error();
	}
?>