<?php

class Deposit_Withdraw_Controller extends CI_Controller {

    public function SMS_deposit(){
        $this->load->model('deposit_withdraw_model');
    	$success=$this->deposit_withdraw_model->deposit($_POST['amount'],$this->session->userdata('accountnumber'));
        if($success){
            echo "Successful deposit of Ksh". $_POST['amount'] ." to account number ".$this->session->userdata('accountnumber').;
        }else{
            echo "Invalid account.\nThe account does not exist.";
        }
    }
    public function SMS_withdraw(){
    	if ($amount > $this->$balance) {
    		echo "You have insufficient Balance ".$balance."Please deposit more money.";
    	}else{
            $this->load->model('Deposit_Withdraw_Model');
    		$this->$balance-=$amount; 
    	}
    }
}