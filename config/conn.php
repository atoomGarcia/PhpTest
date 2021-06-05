<?php
	$conn = new mysqli('localhost', 'root', '', 'phptest');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>