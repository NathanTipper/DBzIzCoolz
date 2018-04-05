<?php  
include 'connectDB.php';

$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];
$searchType = $_POST['searchType'];
$isEmpty = True;

$sql = "SELECT * FROM vehicle";

if($make != '') {
	if($isEmpty) {
		$sql = $sql.' WHERE make = "'.$make.'"';
	}
	else {
		$sql = $sql.' and make = "'.$make.'"';
	}
	$isEmpty = False;
}

if($model != '') {
	if($isEmpty) {
		$sql = $sql.' WHERE model = "'.$model.'"';
	}
	else {
		$sql = $sql.' and model = "'.$model.'"';
	}
	$isEmpty = False;
}

if($year != '') {
	if($isEmpty) {
		$sql = $sql.' WHERE year = "'.$year.'"';
	}
	else {
		$sql = $sql.' and year = "'.$year.'"';
	}
	$isEmpty = False;
}
if($searchType == 'lot') {
    if($isEmpty) {
    $sql = $sql.' WHERE VIN not in (SELECT VIN FROM r_vehicleSold);';
    }
    else {
    $sql = $sql.' and VIN not in (SELECT VIN FROM r_vehicleSold);';
    }
}

if($searchType == 'sold') {
    if($isEmpty) {
    $sql = $sql.' WHERE VIN in (SELECT VIN FROM r_vehicleSold);';
    }
    else {
    $sql = $sql.' and VIN in (SELECT VIN FROM r_vehicleSold);';
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
    <a href="lookupVehicleForm.html"><img src="./assets/backBtn.png" alt="back" class="backBtn"></a>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Lookup Vehicles</h1>
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
                    echo "<div class=\"col-sm-2\"><b>Make: </b>".$row[1]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Model: </b>".$row[2]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Year: </b>".$row[4]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Trim: </b>".$row[3]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Colour: </b>".$row[5]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Condition: </b>".$row[6]."</div>";
                    echo "</div>";
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-sm-2\"><b>KM's: </b>".$row[7]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Style: </b>".$row[8]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Interior: </b>".$row[9]."</div>";
                    echo "<div class=\"col-sm-2\"><b>VIN: </b>".$row[0]."</div>";
                    echo "</div>";
                    echo "<hr>";        
                    }
            ?>
</div>
</body>
</html>