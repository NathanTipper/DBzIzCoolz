<?php session_start(); ?>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
	include 'connectDB.php';
	$vin = $_POST['VIN'];
	$sql = "SELECT VIN, make, model, year, price FROM Vehicle WHERE VIN = \"$vin\"";
	
	$result = mysqli_query($link, $sql);
	$rows = mysqli_num_rows($result);
	if($rows != 0) {
		$row = mysqli_fetch_array($result);
		$_SESSION["VIN"] = $row[0];
		$_SESSION["make"] = $row[1];
		$_SESSION["model"] = $row[2];
		$_SESSION["year"] = $row[3];
		$_SESSION["price"] = $row[4];
		echo "<script> window.location.href = 'salesForm.php'</script>";
	}
	
	else {
		echo "<script>alert('Invalid VIN, try again')</script>";
		echo "<script> window.location.href = 'saleVehicleSearch.php'</script>";
	}
		
?>