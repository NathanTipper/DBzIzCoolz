<?php session_start() ?>
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
<?php $customerDLN = ''; ?>
<div class="jumbotron">
    <a href="index.php"><h1 class="display-4">Westside Autos</h1></a>
    <hr class="my-4">
</div>
<div id="searchCustomerPage" class="topDiv">
    <a href="index.php"><img src="./assets/backBtn.png" alt="back" class="backBtn"></a>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Customer Information</h1>
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
                    <h5>Enter customer's drivers license number</h5>
                </div>
            </div>
        </div>
        <form action="validCustomer.php" method="post" id="searchCustomer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="customerDLN" placeholder="Customer's driver license number" value=<?php echo $customerDLN; ?>>
                            <span class="input-group-btn">
                                <a class="btn btn-primary" onclick="checkInputs('searchCustomer')">Submit</a>
                            </span>
                        </div>
                        <small>*You will be prompt to add customer if he does not exist in the database</small>
                    </div>
                </div>
            </div>
        </form>
</div>
<script src="javascript/myScripts.js"></script>
</body>
</html>