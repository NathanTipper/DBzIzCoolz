<?php session_start(); ?>
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
<?php
    include 'connectDB.php';
    $sql = "SELECT * FROM vehicle WHERE vin NOT IN (SELECT vin FROM r_vehicleSold)";
?>

<div class="jumbotron">
    <a href="index.php"><h1 class="display-4">Westside Autos</h1></a>
    <hr class="my-4">
</div>
<div id="searchVehiclePage" class="topDiv">
    <a href="saleCustomerSearch.php"><img src="./assets/backBtn.png" alt="back" class="backBtn"></a>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Vehicle information</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <hr>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h5>Vehicle Identification Number</h5>
                </div>
            </div>
        </div>
        <form action="validVehicle.php" method="post" id="searchVehicle" style="margin-bottom: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="VIN" placeholder="Enter vehicle vin number">
                            <span class="input-group-btn">
                                <a class="btn btn-primary" onclick="checkInputs('searchVehicle')">Submit</a>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="container">
            <?php 
                $searchQuery = mysqli_query($link, $sql);
                $numRow = mysqli_num_rows($searchQuery);
                $numCol = mysqli_num_fields($searchQuery);
                while($row = mysqli_fetch_array($searchQuery)) {
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-sm-2\"><b>VIN: </b>".$row[0]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Make: </b>".$row[3]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Model: </b>".$row[4]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Trim: </b>".$row[5]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Year: </b>".$row[6]."</div>";
                    echo "<div class=\"col-sm-2\"><b>Colour: </b>".$row[7]."</div>";
                    echo "</div>";
                    echo "<hr>";        
                }
            ?>
        </div>
    </div>
</div>
<script src="javascript/myScripts.js"></script>
</body>
</html>