<?php

class Deposit extends CI_Controller {
    $con = mysqli_connect('localhost', 'root' '', 'SMS_Bank');
    $query = "SELECT * FROM users";
    $result = mysqli_query($con,$query);
    $_SESSION['loadData'] = mysqli_fetch_assoc($result);
    private $accountNumber = $_SESSION['verify']['accountNumber'] ;
    private $balance = $_SESSION['verify']['balance'];

    public function SMS_deposit($amount)
    {
    	// echo 'Hello World!!!';
    	$this->$balance+=$amount;
    	$con->mysqli_query("UPDATE users set balance = '$balance'");
    	echo "Your new balance is :" .$balance. ; 
    }
    public function SMS_withdraw($amount)
    {
    	if ($amount > $this->$balance) {
    		echo "You have insufficient Balance ".$balance."Please deposit more money.";
    	}else{
    		$this->$balance-=$amount;
    		$con->mysqli_query("UPDATE users set balance = '$balance'");
    		echo "Your new balance is :" .$balance.; 
    	}
    }
}