<?php session_start(); ?>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
	include 'connectDB.php';
	$customerDLN = $_POST['customerDLN'];
	$sql = "SELECT drivers_license_no, first_name, last_name FROM customer WHERE drivers_license_no = $customerDLN";
	
	$result = mysqli_query($link, $sql);
	$rows = mysqli_num_rows($result);
	if($rows != 0) {
		$row = mysqli_fetch_array($result);
		$_SESSION["drivers_license_no"] = $row[0];
		$_SESSION["first_name"] = $row[1];
		$_SESSION["last_name"] = $row[2];
		echo "<script> window.location.href = 'saleVehicleSearch.php'</script>";
	}
	
	else {
		$_SESSION['inSale'] = 1;
		echo "<script> window.location.href = 'newCustomerForm.html'</script>";
	}
		
?>