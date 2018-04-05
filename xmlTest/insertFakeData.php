<?php
	include 'connectDB.php';
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	$xml = simplexml_load_file("fakeData.xml") or die("Error: Cannot open file");
	foreach($xml->Customers->children() as $customer) {
		$drivers_license_no = $customer->drivers_license_no;
		$TaxID = 0;
		$address = $customer->address;
		$city = $customer->city;
		$province = $customer->province;
		$postal_code = $customer->postal_code;
		$first_name = $customer->first_name;
		$last_name = $customer->last_name;
		$no_of_late_payments = 0;
		$gender = $customer->gender;
		$DOB = $customer->DOB;
		$phone_no = $customer->phone_no;
		
		$sql = "INSERT INTO customer (drivers_license_no, TaxID, address, city, province, postal_code, first_name, last_name, gender, DOB, phone_no) VALUES (\"$drivers_license_no\", $TaxID, \"$address\", \"$city\", \"$province\", \"$postal_code\", \"$first_name\", \"$last_name\", \"$gender\", \"$DOB\", \"$phone_no\")";
		$result = mysqli_query($link, $sql);
		if(!$result) {
			echo "<script>alert('$sql')</script>";
			break;
		}
	}
	
	foreach($xml->Employees->children() as $employee) {
		$empid = $employee->empid;
		$dept = $employee->dept;
		$first_name = $employee->first_name;
		$last_name = $employee->last_name;
		$phone_no = $employee->phone_no;
		$city = $employee->city;
		$postal_code = $employee->postal_code;
		$province = $employee->province;
		$address = $employee->address;
		
		$sql = "INSERT INTO employee (empid, dept, first_name, last_name, phone_no, city, postal_code, province, address) VALUES (\"$empid\", \"$dept\", \"$first_name\", \"$last_name\", $phone_no, \"$city\", \"$postal_code\", \"$province\", \"$address\")";
		$result = mysqli_query($link, $sql);
		if(!$result) {
			echo "<script>alert('Failure: Could not add to employee')</script>";
			break;
		}
	}
	
	foreach($xml->Purchases->children() as $purchase) {
		$date_of_purchase = $purchase->date_of_purchase;
		$seller = $purchase->seller;
		$isAuction = $purchase->isAuction;
		$location = $purchase->location;
		
		$sql = "SELECT * FROM purchased";
		$result = mysqli_query($link, $sql);
		
		$sql = "INSERT INTO purchased (date_of_purchase, seller, isAuction, location) VALUES (\"$date_of_purchase\", \"$seller\", $isAuction, \"$location\")";
		$result = mysqli_query($link, $sql);
		if(!$result) {
			echo "<script>alert('Failure: Could not add to purchased')</script>";
			break;
		}
	}
	
	$purchase_ID = 1;
	foreach($xml->Vehicles->children() as $vehicle) {
		$VIN = $vehicle->VIN;
		$price = $vehicle->price;
		$book_price = $vehicle->book_price;
		$make = $vehicle->make;
		$model = $vehicle->model;
		$car_trim = $vehicle->car_trim;
		$year = $vehicle->year;
		$color = $vehicle->color;
		$current_condition = $vehicle->current_condition;
		$km = $vehicle->km;
		$style = $vehicle->style;
		$interior_color = $vehicle->interior;
		
		$sql = "INSERT INTO vehicle (VIN, price, book_price, make, model, trim, year, color, current_condition, km, style, interior_color) VALUES (\"$VIN\", $price, $book_price, \"$make\", \"$model\", \"$car_trim\", $year, \"$color\", \"$current_condition\", $km, \"$style\", \"$interior_color\")";
		$result = mysqli_query($link, $sql);
		if(!$result) {
			echo "<script>alert('$sql')</script>";
			break;
		}
		
		$sql = "INSERT INTO r_purchasedrelationship (purchase_ID, VIN) VALUES ($purchase_ID, \"$VIN\")";
		$result = mysqli_query($link, $sql);
		if(!$result) {
			echo "<script>alert('Failure: Could not add to r_purchasedrelationship. $sql')</script>";
			break;
		}
		
		$purchase_ID++;
	}
	
?>