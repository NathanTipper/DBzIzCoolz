<?php
	session_start();
	if(!$_SESSION['initialized']) {
		$_SESSION['invoice_no'] = 1;
		$_SESSION['initialized'] = 1;
	}
?>