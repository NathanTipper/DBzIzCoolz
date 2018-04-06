<?php
	include 'connectDB.php';	
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	$sql = "SELECT * FROM customer";
	$result = mysqli_query($link, $sql);
	
	if(!mysqli_num_rows($result)) {
	
		$xml = simplexml_load_file("fakeData.xml") or die("Error: Cannot open file");
		
		foreach($xml->Damages->children() as $damage) {
			$description = $damage->description;
			$est_cost = $damage->est_cost;
			
			$sql = "INSERT INTO damage (est_cost, description) VALUES ($est_cost, \"$description\")";
			$result = mysqli_query($link, $sql);
			if(!$result) {
				echo "<script>alert('$sql')</script>";
				break;
			}
		}
		
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
			
			// $sql = "SELECT * FROM employee";
			// $result = mysqli_query($link, $sql);
			// if(mysqli_num_rows($result)) {
				// break;
			// }
			
			$sql = "INSERT INTO employee (dept, first_name, last_name, phone_no, city, postal_code, province, address) VALUES (\"$dept\", \"$first_name\", \"$last_name\", $phone_no, \"$city\", \"$postal_code\", \"$province\", \"$address\")";
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
			
			// $sql = "SELECT * FROM purchased";
			// $result = mysqli_query($link, $sql);
			// if(mysqli_num_rows($result)) {
				// break;
			// }
			
			$sql = "INSERT INTO purchased (date_of_purchase, seller, isAuction, location) VALUES (\"$date_of_purchase\", \"$seller\", $isAuction, \"$location\")";
			$result = mysqli_query($link, $sql);
			if(!$result) {
				echo "<script>alert('Failure: Could not add to purchased')</script>";
				break;
			}
		}
		
		foreach($xml->Warranties->children() as $warranty) {
			$warranty_name = $warranty->warranty_name;
			$length = $warranty->length;
			$cost = $warranty->cost;
			$deductible = $warranty->deductible;
			
			$sql = "INSERT INTO warranty (warranty_name, length, cost, deductible) VALUES (\"$warranty_name\", $length, $cost, $deductible)";
			$result = mysqli_query($link, $sql);
			if(!$result) {
				echo "<script>alert('$sql')</script>";
				break;
			}
		}
		
		$purchase_ID = 1;
		$damages_ID = 1;
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
			
			if($purchase_ID == 1) {
				$sql = "INSERT INTO r_vehicledamage (VIN, dmg_id) VALUES (\"$VIN\", $damages_ID)";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql')</script>";
					exit();
				}
				
				++$damages_ID;
				$sql = "INSERT INTO r_vehicledamage (VIN, dmg_id) VALUES (\"$VIN\", $damages_ID)";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql')</script>";
					exit();
				}
				
				++$damages_ID;
				$sql = "INSERT INTO r_vehicledamage (VIN, dmg_id) VALUES (\"$VIN\", $damages_ID)";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql')</script>";
					exit();
				}
				++$damages_ID;
			}
			
			elseif($purchase_ID == 2) {
				$sql = "INSERT INTO r_vehicledamage (VIN, dmg_id) VALUES (\"$VIN\", $damages_ID)";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql')</script>";
					exit();
				}
				
				++$damages_ID;
				$sql = "INSERT INTO r_vehicledamage (VIN, dmg_id) VALUES (\"$VIN\", $damages_ID)";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql')</script>";
					exit();
				}
			}
			
			elseif($purchase_ID == 3) {
				$sql = "INSERT INTO r_vehicleunderwarranty (warranty_name, VIN, start_date) VALUES (\"WestSide Auto Exterior\", \"$VIN\", \"2018-04-01\")";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql')</script>";
					exit();
				}
			}
			
			elseif($purchase_ID == 4) {
				$sql = "INSERT INTO r_vehicleunderwarranty (warranty_name, VIN, start_date) VALUES (\"Gold Package\", \"$VIN\", \"2018-03-25\")";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql   $VIN')</script>";
					exit();
				}
				
				$sql = "INSERT INTO r_vehicleunderwarranty (warranty_name, VIN, start_date) VALUES (\"Vehicle Theft\", \"$VIN\", \"2018-03-25\")";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql   $VIN')</script>";
					exit();
				}
			}
			
			elseif($purchase_ID == 5) {
				$sql = "INSERT INTO r_vehicleunderwarranty (warranty_name, VIN, start_date) VALUES (\"WestSide Auto Exterior\", \"$VIN\", \"2018-04-02\")";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql')</script>";
					exit();
				}
				
				$sql = "INSERT INTO r_vehicleunderwarranty (warranty_name, VIN, start_date) VALUES (\"Vehicle Theft\", \"$VIN\", \"2018-04-02\")";
				$result = mysqli_query($link, $sql);
				if(!$result) {
					echo "<script>alert('$sql')</script>";
					exit();
				}
			}
			
			$sql = "INSERT INTO r_purchasedrelationship (purchase_ID, VIN) VALUES ($purchase_ID, \"$VIN\")";
			$result = mysqli_query($link, $sql);
			if(!$result) {
				echo "<script>alert('Failure: Could not add to r_purchasedrelationship. $sql')</script>";
				break;
			}
			
			$purchase_ID++;
		}
	}
	
?>