<?php
	// Connect to database
	$user = 'root';
	$password = 'root';
	$db = 'bridge_city';
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
	$employeeName = $_POST['employee_name'];
	$department = $_POST['department'];
	
	$sql1 = "INSERT INTO employees (emp_id, employee_name, department) VALUES (\"$empid\", \"$employeeName\", \"$department\")";
	
	$insertQuery = mysqli_query($link, $sql1);

	if($insertQuery) {
		$message = 'Success';
	}
	else {
		$message = 'Failure';
	}
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	echo readfile("index.html");
	
	mysqli_free_result($insertQuery);
	
	mysqli_close($link);
?>