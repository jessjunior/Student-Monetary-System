<?php

class Transaction extends CI_Model {
        
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
        $balance=$this->get_userdata($accountNumber);
        $amount += $balance;
        return $this->update_userdata($amount,$accountNumber);
    }

    public function withdraw($amount,$accountNumber){
        $balance=$this->get_userdata($accountNumber);
        if($amount>$balance){
            return 'invalid funds';
        }
        $balance -= $amount;
        return $this->update_userdata($balance,$accountNumber);
    }

    public function transfer($amount,$to,$from){
        $balanceTo=$this->get_userdata($to);
        $balanceFrom=$this->get_userdata($from);
        if ($balanceFrom < $amount) {
            return "<div class='alert alert-danger'>Insufficient funds. Unable to complete transaction process.</div></div>";
        }else{
            $newBalFrom = $balanceFrom - $amount;
            $newBalTo = $balanceTo + $amount;
            $this->db->trans_start();
            $this->update_userdata($newBalFrom,$from);
            $this->update_userdata($newBalTo,$to);
            $this->db->trans_complete();
        }
    	if($this->db->trans_status()===FALSE){
    	    return "<div class='alert alert-danger'>Error occurred causing transaction to be rolled back. Please try again later.</div></div>";
    	}else{
            $this->load->model("getlog");
            if($this->getlog->log_transaction($from,'Transfer',$amount,$to)){
                return "<div class='alert alert-success'>Transaction complete. $amount sent to $to from $from and transaction has been logged.</div></div>";
            }
            return "<div class='alert alert-warning'>Transaction complete. $amount sent to $to from $from but logging has failed. Please note that there exists no evidence in the system that this transaction occurred.</div></div>";
    	}
    }
}