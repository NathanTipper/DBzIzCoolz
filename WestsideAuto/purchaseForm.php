<?php session_start()
$damageArray = array(); ?>
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
<!-- Repair Modal -->
<div class="modal fade" id="damageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addDamage.php" method="post" id="addDmg">
                    <div class="container" style="padding-bottom: 20px;">
                        <div class="row">
                            <div class="col-sm">
                                <label for="problem">Problem</label>
                                <input type="text" class="form-control" id="problem" name="problem" placeholder="Describe problem">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label for="estRepairCost">Estimated repair cost</label>
                                <input type="text" class="form-control" id="estRepairCost" name="estRepairCost" placeholder="$">
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary" onclick="checkInputModal('addDmg')">Submit</a>
                    <!--<button class="btn btn-primary" style="margin-top: 10px;">Submit</button>-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron">
    <a href="index.html"><h1 class="display-4">Westside Autos</h1></a>
    <hr class="my-4">
</div>
<div id="purchaseFormTop" class="topDiv">
    <a href="index.html"><img src="./assets/backBtn.png" alt="back" class="backBtn"></a>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Add a new vehicle</h1>
            </div>
        </div>
    </div>
    <form id="purchaseInfo" action="insertIntoDB.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="date">Date (YYYY-DD-MM)</label>
                    <input type="date" class="form-control" id="date" name="date_of_purchase" placeholder="YYYY-DD-MM">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                </div>
                <div class="col-sm">
                    <label for="seller">Seller/Dealer</label>
                    <input type="text" class="form-control" id="seller" name="seller" placeholder="Enter Seller/Dealer">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="inputState">Auction</label>
                    <select id="inputState" name="isAuction" class="form-control">
                        <option selected>Purchased at auction</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
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
                    <label for="make">Make</label>
                    <input type="text" class="form-control" id="make" name="make"
                           placeholder="Enter make of the vehicle">
                </div>
                <div class="col-sm">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" id="model" name="model"
                           placeholder="Enter model of the vehicle">
                </div>
                <div class="col-sm">
                    <label for="year">Year</label>
                    <input type="text" class="form-control" id="year" name="year"
                           placeholder="Enter year of the vehicle">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="colour">Colour</label>
                    <input type="text" class="form-control" id="colour" name="color" placeholder="Enter Colour">
                </div>
                <div class="col-sm">
                    <label for="KM">Kilometers</label>
                    <input type="text" class="form-control" id="KM" name="kilometers" placeholder="Enter mileage">
                </div>
                <div class="col-sm">
                    <label for="condition">Condition</label>
                    <input type="text" class="form-control" id="condition" name="vehicle_condition"
                           placeholder="Enter condition">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="interiorColour">Interior Colour</label>
                    <input type="text" class="form-control" id="interiorColour" name="interior_color"
                           placeholder="Enter Interior Colour">
                </div>
                <div class="col-sm">
                    <label for="style">Style</label>
                    <select id="style" name="style" class="form-control">
                        <option selected>Style</option>
                        <option>Convertible</option>
                        <option>Coupe</option>
                        <option>Hatchback</option>
                        <option>Minivan</option>
                        <option>Van</option>
                        <option>Pickup Truck</option>
                        <option>Sedan</option>
                        <option>SUV</option>
                        <option>Crossover</option>
                        <option>Wagon</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="trim">Trim</label>
                    <input type="text" class="form-control" id="trim" name="trim" placeholder="Enter trim">
                </div>
            </div>
        </div>
        <!--<div class="container">-->
        <!--<div class="row">-->
        <!--<div class="col-sm">-->
        <!--<label for="bookPrice"> Book Price</label>-->
        <!--<input type="text" class="form-control" id="bookPrice" placeholder="Enter the book price">-->
        <!--</div>-->
        <!--<div class="col-sm">-->
        <!--<label for="purchasePrice"> Purchased Price</label>-->
        <!--<input type="text" class="form-control" id="purchasePrice" placeholder="Enter the purchased price">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="vin">Vehicle VIN</label>
                    <input type="text" class="form-control" id="vin" name="VIN" placeholder="Enter the VIN number">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="purchase_id">purch id</label>
                    <input type="text" class="form-control" id="purchase_id" name="purchase_ID" placeholder="">
                </div>
            </div>
        </div>
        <input type="hidden" name="insert_into" value="purchased">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#damageModal" style="margin-top: 10px;">
                        Add Repair
                    </button>
                </div>
            </div>
        </div>
        <div class="container" style="padding-top: 30px">
            <div class="row">
                <div class="col-sm">
                    <!--<button class="btn btn-primary" onclick="checkInputs('purchaseInfo')">Submit</button>-->
                    <a class="btn btn-primary" onclick="checkInputs('purchaseInfo')">Submit</a>
                    <button class="btn btn-secondary" type="reset" value="Reset">Reset</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="javascript/myScripts.js"></script>
</body>


</html>
























