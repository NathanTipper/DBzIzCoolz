<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
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

	if(!$success) {
		echo "COULD NOT CONNECT<br>";
		exit();
	}
	
	$search_type = $_POST['search'];
	
	$sql = "";
	
	switch($search_type) {
		case 'vehicles_on_lot':
			$sql = "SELECT * FROM vehicle";
			break;
			
		case 'vehicles_not_under_warranty':
			$sql = "SELECT VIN, make, model, year FROM r_purchasedrelationship natural join vehicle WHERE r_purchasedrelationship.VIN NOT IN (SELECT VIN FROM r_vehicleunderwarranty)";
			break;
			
		default:
			echo "No result";
			exit();
	}
	
	echo $sql."<br>";
	$searchQuery = mysqli_query($link, $sql);
	$numRow = mysqli_num_rows($searchQuery);
	$numCol = mysqli_num_fields($searchQuery);
	echo "$numCol "."$numRow"."<br>";
	while($row = mysqli_fetch_array($searchQuery)) {
		for($i = 0; $i < $numCol; $i++) {
			echo $row[$i]." ";
		}
		
		echo "<br>";
	}
	
	if($searchQuery)
		mysqli_free_result($searchQuery);
	
	
	mysqli_close($link);

?>