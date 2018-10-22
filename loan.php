<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost', 'root', '', 'bank');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if($_POST['amountreq'] == $_POST['amountreq']) {
	
		$amountreq = $mysqli -> real_escape_string($_POST['amountreq']);
		$payback = $mysqli -> real_escape_string($_POST['payback']);
		
		$sql = "INSERT INTO loans(amountreq, payback) VALUES('$amountreq','$payback')";
		
		if($mysqli->query($sql) === true) {
			$_SESSION['message'] = "Application successful! your request has been received";
			header("location: received.php");
		}
		
		else {
			echo $_SESSION['message'] = "Not eligible to apply for loan!";
		}
	}	else { 
			echo $_SESSION['message'] = "";
		}
		
	}	

	
?>