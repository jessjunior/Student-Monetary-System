<?php

class Deposit_Withdraw_Model extends CI_Model {
        
    public function __construct() {
        parent::__construct();
    }

    private function update_userdata($amount,$accountNumber){
    	return $this->db->set('Balance',$amount)->where('acc_no',$accountNumber)->update('accounts');
    }

    private function get_userdata($accountNumber){
        return $this->db->select('Balance')->where('acc_no',$accountNumber)->get('accounts')->row()->Balance;
    }

    public function deposit($amount,$accountNumber){}

    public function withdraw($amount,$accountNumber){}

    public function transfer($amount,$to,$from){}
}