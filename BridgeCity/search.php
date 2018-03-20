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
	
	$sql = "SELECT employee_name FROM employees WHERE emp_id = \"$empid\"";
	$searchQuery = mysqli_query($link, $sql);

	$rows = mysqli_num_rows($searchQuery);
	
	readfile("index.html");
	if($rows > 0) {
		echo "RESULT $rows: <br>";
		$array = mysqli_fetch_array($searchQuery, MYSQLI_NUM);
		echo $array[0]."<br>";
		
	}
	
	mysqli_free_result($searchQuery);
	
	mysqli_close($link);
?>