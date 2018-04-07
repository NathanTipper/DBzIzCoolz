<?php 
	include 'insertFakeData.php';
	include 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
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
    <h1 class="display-4">Westside Autos</h1>
    <p class="lead">Welcome to your all-in-one solution for purchasing and sales.</p>
    <p></p>
    <hr class="my-4">
</div>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <a href="saleCustomerSearch.php" class="btn homeOptions">Sell a Vehicle</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <a href="purchaseForm.html" class="btn homeOptions">Add a Vehicle to the Inventory</a>
        </div>
        <div class="col-sm">
            <a href="lookupVehicleForm.html" class="btn homeOptions">Lookup Vehicles</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <a href="newCustomerForm.html" class="btn homeOptions">Add a New Customer </a>
        </div>
        <div class="col-sm">
            <a href="lookupCustomerForm.html" class="btn homeOptions">Lookup Customers</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <a href="newEmployeeForm.html" class="btn homeOptions">Add a New Employee</a>
        </div>
        <div class="col-sm">
            <a href="lookupSaleForm.html" class="btn homeOptions">Lookup Sales</a>
        </div>
    </div>
</div>


</body>
</html>