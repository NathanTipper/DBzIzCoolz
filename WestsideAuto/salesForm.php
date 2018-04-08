<?php 
    session_start(); 
    $downPayment = '';

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
    <a href="saleVehicleSearch.php"><img src="./assets/backBtn.png" alt="back" class="backBtn"></a>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Vehicle Sale</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <p><b>Customer name:</b> <?php echo $_SESSION["first_name"]." ".$_SESSION["last_name"]; ?></p>
            </div>
        </div>
    </div>
        <div class="container">
        <div class="row">
            <div class="col-sm">
                <p><b>Vehicle Information:</b> <?php echo $_SESSION["year"]." ".$_SESSION["make"]." ".$_SESSION["model"]; ?></p>
            </div>
        </div>
    </div>
    <form action="insertIntoDB.php" method="post" id="saleInfo">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="date">Date (YYYY-MM-DD)</label>
                    <input type="date" class="form-control" id="date" name="date_purchased" placeholder="YYYY-MM-DD">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="has_warranty">Warranty?</label>
                    <select id="has_warranty" name="has_warranty" class="form-control" onchange="toggleWarrantyInput(this.value)">
                        <option selected >No</option>
                        <option>Yes</option>
                    </select>
                </div>
            </div>
        </div>
<div class="warranties" id="warranty_names" style="display: none">
        <div class="container" >
            <div class="row">
                <div class="col-sm">
                    <label>Warranty Name</label>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="warranty_name[]" id="Exterior" value="WestSide Auto Exterior">
                        <label class="form-check-label" for="Exterior">WestSide Auto Exterior</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="warranty_name[]" id="Gold" value="Gold Package">
                        <label class="form-check-label" for="Gold">Gold Package</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="warranty_name[]" id="Theft" value="Vehicle Theft">
                        <label class="form-check-label" for="Theft">Vehicle Theft</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="totalDue">Cost of Vehicle</label>
                    <input type="number" step="100" data-number-to-fixed="2" data-number-stepfactor="100"
                           name="cost_of_vehicle" class="form-control" id="totalDue" placeholder="$" value="<?php echo $_SESSION['price']?>"
                           disabled>
                </div>
                <div class="col-sm">
                    <label for="downPayment">Down Payment</label>
                    <input type="number" step="100" data-number-to-fixed="2" data-number-stepfactor="100"
                           class="form-control" name="down_payment" id="downPayment" placeholder="$" value="<?php echo $downPayment?>">
                </div>
                <div class="col-sm">
                    <label for="financeAmount">Finance Amount (5%)</label>
                    <input type="number" step="100" data-number-to-fixed="2" data-number-stepfactor="100"
                           class="form-control" id="financeAmount" placeholder="$">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="empid">Employee id</label>
                    <input type="text" step="100" class="form-control" id="empid" name="empid"
                           placeholder="Enter employee id">
                </div>
                <div class="col-sm">
                    <label for="commission">Sale commission</label>
                    <input type="number" step="100" data-number-to-fixed="2" data-number-stepfactor="100"
                           class="form-control" id="commission" placeholder="$" value="<?php echo $_SESSION['price'] * .015 ?>" disabled>
                </div>
            </div>
        </div>
        <input type="hidden" name="insert_into" value="invoice">
        <div class="container" style="padding-top: 30px">
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-primary" onclick="checkInputs('saleInfo')">Submit</a>
                    <button class="btn btn-secondary" type="reset" value="Reset">Reset</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="javascript/myScripts.js"></script>
</body>
</html>
