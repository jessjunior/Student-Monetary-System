<?php

class Deposit_Withdraw_Controller extends CI_Controller {
    
    private $accountNumber = $_SESSION['verify']['accountNumber'] ;
    private $balance = $_SESSION['verify']['balance'];

    public function SMS_deposit($amount)
    {
        $this->load->model('Deposit_Withdraw_Model');
    	$this->$balance+=$amount;
    }
    public function SMS_withdraw($amount)
    {
    	if ($amount > $this->$balance) {
    		echo "You have insufficient Balance ".$balance."Please deposit more money.";
    	}else{
            $this->load->model('Deposit_Withdraw_Model');
    		$this->$balance-=$amount; 
    	}
    }
}