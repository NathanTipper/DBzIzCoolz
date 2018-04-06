<?php
	session_start();
	if(!$_SESSION['initialized']) {
		$_SESSION['invoiceNumber'] = 1;
		$_SESSION['initialized'] = 1;
	}
?>