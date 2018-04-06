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
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date_purchased" placeholder="YYYY-DD-MM">
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
				<div class="col-sm" id="warranty_names" style="display: none">
					<label for="warranty_name">Warranty Name</label>
					<input type="checkbox" name="warranty_name[]" value="WestSide Auto Exterior">WestSide Auto Exterior   </input>
					<input type="checkbox" name="warranty_name[]" value="Gold Package">Gold Package    </input>
					<input type="checkbox" name="warranty_name[]" value="Vehicle Theft">Vehicle Theft   </input>
				</div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="totalDue">Total Due</label>
                    <input type="number" step="100" data-number-to-fixed="2" data-number-stepfactor="100"
                           class="form-control" id="totalDue" placeholder="$">
                </div>
                <div class="col-sm">
                    <label for="downPayment">Down Payment</label>
                    <input type="number" step="100" data-number-to-fixed="2" data-number-stepfactor="100"
                           class="form-control" name="down_payment" id="downPayment" placeholder="$">
                </div>
                <div class="col-sm">
                    <label for="financeAmount">Finance Amount</label>
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
                           class="form-control" id="commission" placeholder="$">
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
