<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost', 'root', '', 'bank');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if($_POST['paybackamnt'] == $_POST['paybackamnt']) {
	
		$paybackamnt = $mysqli -> real_escape_string($_POST['paybackamnt']);
		$payback = $mysqli -> real_escape_string($_POST['payback']);
		$Balance = $mysql -> real_escape_string($_POST['Balance']);
		$BalanceLeft = $mysql -> real_escape_string($_POST['BalanceLeft']);
		
		$sql = "INSERT INTO loans(paybackamnt, payback, Balance) VALUES('$paybackamnt','$payback', '$Balance')";
		
		if($mysqli->query($sql) === true) {
			$_SESSION['message'] = "Loan has been Paid back. paybackamnt left to be paid is $BalanceLeft. ";
			header("location: received.php");
		}
		
		else {
			echo $_SESSION['message'] = "You do not have enough credit to pay back Loan!";
		}
	}	else { 
			echo $_SESSION['message'] = "";
		}
		
	}	

	
?>