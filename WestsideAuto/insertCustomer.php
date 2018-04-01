<?php
	echo "hello"
	?>
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
	echo "<h1>hello</h1>";
	
	$dln = $_POST['dln'];
	
	$sql1 = "INSERT INTO Customer (Drivers_license_no) VALUES (\"$dln\")";
	
	$insertQuery = mysqli_query($link, $sql1);

	if($insertQuery) {
		$message = 'Success';
	}
	else {
		$message = 'Failure';
	}
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	// echo readfile("salesForm.html");
	
	mysqli_free_result($insertQuery);
	
	mysqli_close($link);
?>