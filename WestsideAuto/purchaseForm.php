<!DOCTYPE html>
<html>
<head>
	<title>WestSide Autos</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div id="header">
		<h1>Westside Auto</h1>
	</div>
	<div id="navBar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><h3>Forms</h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/purchaseForm.php">Purchase <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/salesForm.php">Sales </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/warrantiesForm.php">Warranties </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/paymentsForm.php">Payments </a>
      </li>
    </ul>
  </div>
</nav>
	</div>
	<div id="purchaseFormTop" style="padding: 30px">
		<form>		  
		  <div class="container">
		  	<div class="row">
		  		<div class="col-sm">
		  			<label for="date">Date</label>
		  			<input type="date" class="form-control" id="date" placeholder="DD/MM/YYYY">
		  		</div>
		  	</div>
		  </div>
		  <div class="container">
		  	<div class="row">
		  		<div class="col-sm">
		  			<label for="location">Location</label>
		    		<input type="text" class="form-control" id="location" placeholder="Enter location">
		  		</div>
		  		<div class="col-sm">
		  			<label for="seller">Seller/Dealer</label>
		    		<input type="text" class="form-control" id="seller" placeholder="Enter Seller/Dealer">
		  		</div>
		  	</div>
		  </div>
		  <div class="container">
		  	<div class="row">
		  		<div class="col-sm">
		  			<label for="inputState">Auction</label>
		      		<select id="inputState" class="form-control">
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
		  			<input type="text" class="form-control" id="make" placeholder="Enter make of the vehicle">
		  		</div>
		  		<div class="col-sm">
		  			<label for="model">Model</label>
		  			<input type="text" class="form-control" id="model" placeholder="Enter model of the vehicle">
		  		</div>
		  		<div class="col-sm">
		  			<label for="year">Year</label>
		  			<input type="text" class="form-control" id="year" placeholder="Enter year of the vehicle">
		  		</div>
		  	</div>
		  </div>
		  <div class="container">
		  	<div class="row">
		  		<div class="col-sm">
		  			<label for="colour">Colour</label>
		  			<input type="text" class="form-control" id="colour" placeholder="Enter Colour">
		  		</div>
		  		<div class="col-sm">
		  			<label for="miles">Miles</label>
		  			<input type="text" class="form-control" id="miles" placeholder="Enter mileage">
		  		</div>
		  		<div class="col-sm">
		  			<label for="condition">Condition</label>
		  			<input type="text" class="form-control" id="condition" placeholder="Enter condition">
		  		</div>
		  	</div>
		  </div>
		  <div class="container">
		  	<div class="row">
		  		<div class="col-sm">
		  			<label for="bookPrice"> Book Price</label>
		  			<input type="text" class="form-control" id="bookPrice" placeholder="Enter the book price">
		  		</div>
		  		<div class="col-sm">
		  			<label for="purchasePrice"> Purchased Price</label>
		  			<input type="text" class="form-control" id="purchasePrice" placeholder="Enter the purchased price">
		  		</div>
		  	</div>
		  </div>
		  	</div>
		  </div>
		  <div class="container">
		  	<div class="row">
		  		<div class="col-sm">
		  			<button type="submit" class="btn btn-primary">Submit</button>
		  		</div>
		  	</div>
		  </div>
		</form>
	</div>

</body>


</html>
























