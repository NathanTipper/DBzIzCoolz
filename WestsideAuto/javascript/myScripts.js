
function checkInputs(x) {
    var isValid = true;

    var elements = document.getElementById(x).getElementsByTagName('input');

    for(var i=0; i < elements.length; i++){
        if(elements[i].value.length < 1){
            isValid = false;
        }
    }

    if(isValid){
        document.getElementById(x).submit();
    }
    else {
        alert('Please fill all required fields');
    }
}

function checkInputModal(x) {
    var isValid = true;

    var elements = document.getElementById(x).getElementsByTagName('input');

    for(var i=0; i < elements.length; i++){
        if(elements[i].value.length < 1){
            isValid = false;
        }
    }

    if(isValid){
        document.getElementById(x).submit();
        $('#damageModal').modal('hide');
        document.getElementById(x).reset();
    }
    else {
        alert('Please fill all required fields');
    }
}

function checkVIN(x) {
    var vin = document.getElementById(x);

    if(vin.value.length > 1) {
        document.getElementById('modalVin').value = vin.value;
        $('#damageModal').modal('show');

    }
    else {
        alert('Please enter a VIN number first');
    }
}

function backBtn(x) {
    history.go(-1);
}

function toggleWarrantyInput(x) {
	var select = document.getElementById('warranty_names');
	alert(x);
	if(x == "Yes") {
		select.style.display = "block";
	}
	
	else {
		select.style.display = "none";
	}
}