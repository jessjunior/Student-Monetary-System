<?php

class Deposit_Withdraw_Model extends CI_Model {
        
    public function __construct() {
    	$this->load->database($db);
    }

    public function user_data($accountNumber)
    {
    	if ($ != FALSE) {
    	$query = $this->db->get_where('users' , array('accountNumber' => $accountNumber));
    	return $query->row_array();
    	}
    	else{
    		return FALSE;
    	}
    }

    public function update_userdata($amount)
    {
    	$this->db->set('balance',$amount);
    	$this->db->insert('users');
    }
}