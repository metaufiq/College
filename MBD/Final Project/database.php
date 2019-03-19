<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$databaseName = "DIARYDataNew";

	$conn = mysqli_connect($host, $username, $password, $databaseName);
	

	if (!$conn) {
		# code...
		die("connection error");
	}
  ?>



