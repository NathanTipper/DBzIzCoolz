<?php 
include 'connectDB.php';
$empid = $_POST['empid'];
$date_from = $_POST['date_from'];
$date_to = $_POST['date_to'];
$currentDate = date("Y-m-d");

if($date_from == '') {
    $date_from = '1900-01-01';
}
if($date_to == '') {
    $date_to = $currentDate;
}

$sql = 'SELECT employee.empid, employee.first_name, employee.last_name, invoice.invoice_no, invoice.date_purchased, invoice.price_sold
        FROM invoice, r_soldBy, employee 
        WHERE (date_purchased between "'.$date_from.'" and "'.$date_to.'")
                and (invoice.invoice_no = r_soldBy.invoice_no) and (r_soldBy.empid = employee.empid)';

if($empid != '') {
    $sql = $sql.'and employee.empid = '.$empid;
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
    <a href="lookupSaleForm.html"><img src="./assets/backBtn.png" alt="back" class="backBtn"></a>
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
        echo "<div class=\"col-sm-4\"><b>Employee ID: </b>".$row[0]."</div>";
        echo "<div class=\"col-sm-4\"><b>First Name: </b>".$row[1]."</div>";
        echo "<div class=\"col-sm-4\"><b>Last Name: </b>".$row[2]."</div>";
        echo "</div>";
        echo "<div class=\"row\">";
        echo "<div class=\"col-sm-4\"><b>Invoice Number: </b>".$row[3]."</div>";
        echo "<div class=\"col-sm-4\"><b>Date Sold: </b>".$row[4]."</div>";
        echo "<div class=\"col-sm-4\"><b>Price Sold: $</b>".$row[5]."</div>";
        echo "</div>";
        echo "<hr>"; 
        }
?>
</div>
</body>
</html>
