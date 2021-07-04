<!-- CONNECT TO DATABASE -->
<?php
	// Database settings
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "helpdesk";

	// Trying to connect to the database
	//header('Content-Type:text/html; charset=UTF-8');
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if( !$conn ) {
		die("Database connection failed: " . mysqli_connect_error());
	}else{
		$conn->set_charset("utf8");
	}
?>
