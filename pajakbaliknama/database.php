<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'pajak';
	$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}
?>