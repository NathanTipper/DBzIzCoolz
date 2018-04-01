<?php
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

	$search_type = $_POST['search'];
	
	$sql = "";
	
	switch($search_type) {
		case 'vehicles_on_lot':
			$VIN = $_POST['VIN'];
			$sql = "SELECT * FROM vehicle WHERE VIN = $VIN";
			break;
	}
	
	$searchQuery = mysqli_query($link, $sql);
	
	$row = mysqli_fetch_all($searchQuery, MYSQLI_NUM);
	
	if($row) {
		for($i = 0; i < count($row); $i++) {
			echo $row[i];
		}
		mysqli_free_result($searchQuery);
	}
	
	mysqli_close($link);
?>