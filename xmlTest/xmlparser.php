<?php
	$xml = simplexml_load_file("fakeData.xml") or die("Error: Cannot open file");
	foreach($xml->Customers->children() as $customer) {
		echo $customer->first_name." ".$customer->last_name."<br>";
	}
?>