<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	$user = 'root';
	$password = 'root';
	$db = 'bridge_city';
	$host = 'localhost';
	$port = 3307;

	$link = mysqli_init();
	$success = mysqli_real_connect(
	   $link, 
	   $host, 
	   $user, 
	   $password, 
	   $db,
	   $port
	);
	
	if(!$success)
		exit("Couldn't connect to DB");
	
	$inputType = $_POST['insert_into'];
	$sql = "";
	echo $inputType."<br>";
	
	switch($inputType) {
		case "purchase":
			$purchaseID = $_POST['purchase_id'];
			$dateOfPurchase = $_POST['date'];
			$seller = $_POST['seller'];
			$isAuction = $_POST['isAuction'];
			$location = $_POST['location'];
			
			if($isAuction == 'Yes')
				$isAuction = 1;
			else
				$isAuction = 0;
			
			$sql = "INSERT INTO purchase (purchase_id, date, seller, is_auction, location) VALUES ($purchaseID, \"$dateOfPurchase\", \"$seller\", $isAuction, \"$location\")";  
			break;
		case "vehicle":
			$VIN = $_POST['VIN'];
			$make = $_POST['make'];
			$model = $_POST['model'];
			$year = $_POST['year'];
			$colour = $_POST['colour'];
			$vehicle_condition = $_POST['vehicle_condition'];
			$kilometers = $_POST['kilometers'];
			$style = $_POST['style'];
			$interiorColour = $_POST['interiorColour'];
			
			$sql = "INSERT INTO vehicles (VIN, make, model, year, colour, vehicle_condition, kilometers, style, interior_colour) VALUES (\"$VIN\", \"$make\", \"$model\", $year, \"$colour\", \"$vehicle_condition\", $kilometers, \"$style\", \"$interiorColour\")"; 
			break;
		case "employee":
			$empid = $_POST['empid'];
			$employee_name = $_POST['employee_name'];
			$department = $_POST['department'];
			$phone_number = $_POST['phone_number'];
			$street_number = $_POST['street_number'];
			$city = $_POST['city'];
			$postal_code = $_POST['employee_postal_code'];
			
			$sql = "INSERT INTO employees (empid, name, department, phone_number, street_number, city, postal_code) VALUES (\"$empid\", \"$name\", \"$department\", \"$phone_number\", \"$street_number\", \"$city\", \"$postal_code\")";
			break;
		
		case "customer":
			$drivers_license = $_POST['drivers_license'];
			$customer_name = $_POST['customer_name'];
			$customer_address = $_POST['customer_address'];
			$customer_city = $_POST['customer_city'];
			$customer_postal_code = $_POST['customer_postal_code'];
			$tax_id = $_POST['tax_id'];
			
			$sql = "INSERT INTO customers (drivers_license, customer_name, customer_address, customer_city, customer_postal_code, tax_id) VALUES (\"$drivers_license\", \"$customer_name\", \"$customer_address\", \"$customer_city\", \"$customer_postal_code\", \"$tax_id\")";
			
			break;
		
		default:
			echo "Found nothing!";
			break;
	}
	
	echo $sql."<br>";
	$result = mysqli_query($link, $sql);
	
	if($result) {
		echo "Success<br>";
	}
	else
		echo "Failure<br>";
	
	mysqli_close($link);
?>