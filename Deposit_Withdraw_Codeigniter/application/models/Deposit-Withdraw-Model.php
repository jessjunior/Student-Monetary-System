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

    public function deposit($amount,$accountNumber){
        $this->$amount += $balance;
        return $amount;
    }

    public function withdraw($amount,$accountNumber){
        $this->$amount -= $balance;
        return $amount;
    }

    public function transfer($amount,$to,$from){
        $this->db->get_userdata($accountNumber);
        $this->db->execute(array('$accountNumber' => $from));
        $this->availableAmount = $this->db->('Balance') -> fetchColumn();
        if ($this->availableAmount < $amount) {
            echo "Insufficient funds.\nUnable to complete transaction process.";
            return false;
        }else{
            $this->$amount = $availableAmount - $amount;
            $this->db->update_userdata($amount,$from);

            $this->db->get_userdata($to);
            $this->$balance = $this->db->('Balance') -> fetchColumn();
            $this->amount += $balance;
            $this->db->update_userdata($amount,$to);
            $this->db->commit();
        }
        

    }
}