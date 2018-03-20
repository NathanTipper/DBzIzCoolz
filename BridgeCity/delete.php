<?php
	$user = 'root';
	$password = 'root';
	$db = 'bridge_city'; // REPLACE WITH YOUR DATABASE
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

	$empid = $_POST['emp_id'];
	
	$sql = "DELETE FROM employees WHERE emp_id = \"$empid\"";
	$deleteQuery = mysqli_query($link, $sql);

	if($deleteQuery) {
		$message = 'Success';
	}
	else {
		$message = 'Failure';
	}
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	//readfile("index.html");
	
	mysqli_free_result($deleteQuery);
	
	mysqli_close($link);
?>