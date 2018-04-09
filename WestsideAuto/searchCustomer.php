<?php  
include 'connectDB.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$drivers_license_no = $_POST['drivers_license_no'];
$searchType = $_POST['searchType'];
$isEmpty = True;

$sql = "SELECT * FROM customer";

if($first_name != '') {
	if($isEmpty) {
		$sql = $sql.' WHERE first_name = "'.$first_name.'"';
	}
	else {
		$sql = $sql.' and first_name = "'.$first_name.'"';
	}
	$isEmpty = False;
}

if($last_name != '') {
	if($isEmpty) {
		$sql = $sql.' WHERE last_name = "'.$last_name.'"';
	}
	else {
		$sql = $sql.' and last_name = "'.$last_name.'"';
	}
	$isEmpty = False;
}

if($drivers_license_no != '') {
	if($isEmpty) {
		$sql = $sql.' WHERE drivers_license_no = "'.$drivers_license_no.'"';
	}
	else {
		$sql = $sql.' and drivers_license_no = "'.$drivers_license_no.'"';
	}
	$isEmpty = False;
}
if($searchType == 'noPurchase') {
    if($isEmpty) {
    $sql = $sql.' WHERE drivers_license_no not in (SELECT drivers_license_no FROM r_soldTo);';
    }
    else {
    $sql = $sql.' and drivers_license_no not in (SELECT drivers_license_no FROM r_soldTo);';
    }
}

if($searchType == 'withPurchase') {
    if($isEmpty) {
    $sql = $sql.' WHERE drivers_license_no in (SELECT drivers_license_no FROM r_soldTo);';
    }
    else {
    $sql = $sql.' and drivers_license_no in (SELECT drivers_license_no FROM r_soldTo);';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8">
    <title>WestSide Autos</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/myStyle.css">
</head>
<body>
<div class="jumbotron">
    <a href="index.php"><h1 class="display-4">Westside Autos</h1></a>
    <hr class="my-4">
</div>
<div id="purchaseFormTop" class="topDiv">
    <a href="lookupCustomerForm.html"><img src="./assets/backBtn.png" alt="back" class="backBtn"></a>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Lookup Customer</h1>
            </div>
        </div>
    </div>

<div class="container">
            <?php 
                $searchQuery = mysqli_query($link, $sql);
                $numRow = mysqli_num_rows($searchQuery);
                if($numRow == 0) {
                	echo "<h3>No Results</3>";
                }
                $numCol = mysqli_num_fields($searchQuery);
                while($row = mysqli_fetch_array($searchQuery)) {
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-sm-4\"><b>First Name: </b>".$row[6]."</div>";
                    echo "<div class=\"col-sm-4\"><b>Last Name: </b>".$row[7]."</div>";
                    echo "<div class=\"col-sm-4\"><b>Gender: </b>".$row[9]."</div>";
                    echo "</div>";
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-sm-4\"><b>Address: </b>".$row[2]."</div>";
                    echo "<div class=\"col-sm-4\"><b>City: </b>".$row[3]."</div>";
                    echo "<div class=\"col-sm-4\"><b>Province: </b>".$row[4]."</div>";
                    echo "</div>";
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-sm-4\"><b>Postal Code: </b>".$row[5]."</div>";
                    echo "<div class=\"col-sm-4\"><b>Date of Birth: </b>".$row[10]."</div>";
                    echo "<div class=\"col-sm-4\"><b>Drivers license Number: </b>".$row[0]."</div>";
                    echo "</div>";
                    echo "<div class=\"row\">";
                    if($searchType == 'withPurchase') {
                    echo "<div class=\"col-sm-4\"><b># of Late Payments: </b>".$row[8]."</div>";
                    }
                    echo "<div class=\"col-sm-4\"><b>Tax ID: </b>".$row[1]."</div>";
                    echo "</div>";
                    echo "<hr>";        
                    }
            ?>
</div>
</body>
</html>