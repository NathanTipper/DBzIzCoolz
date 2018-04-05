<?php
	include 'connectDB.php';
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
		$sql = "INSERT INTO customer (drivers_license_no, TaxID, address, city, province, postal_code, first_name, last_name, no_of_late_payments, gender, DOB) VALUES (\"$drivers_license_no\", $TaxID, \"$address\", \"$city\", \"$province\", \"$postal_code\", \"$first_name\", \"$last_name\", $no_of_late_payments, \"$gender\", \"$DOB\")";
		$result = mysqli_query($link, $sql);
		if(!$result) {
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
			break;
		}
	}
	
?>