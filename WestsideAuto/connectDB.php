<?php
	// Connect to database
	$user = 'root';
	$password = 'root';
	$db = 'westsideAuto';
	$host = 'localhost';
	$port = 3306;

	$link = mysqli_init();
	$success = mysqli_real_connect(
	   $link,
	   $host,
	   $user,
	   $password,
	   $db,
	   $port
	);

	print($success);

$sql = "select Drivers_licence_no from Customer"

$result = mysqli_query($success, $sql);

print($result);
//	echo mysqli_query($link, "select * from Customer");

?>