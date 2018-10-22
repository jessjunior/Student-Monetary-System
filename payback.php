<?php
class payback extends CI_Model {
        
    public function __construct() {
        parent::__construct();
    }
    private function update_userdata($paybackamnt,$payback){
    	return $this->db->set('Balance',$paybackamnt)->where('accountno',$payback)->update('accounts');
    }
    private function get_userdata($payback){
        return $this->db->select('Balance')->where('accountno',$payback)->get('accounts')->row()->Balance;
    }
    public function deposit($paybackamnt,$payback){
        $Balance=$this->get_userdata($payback);
        $paybackamnt += $Balance;
        return $this->update_userdata($paybackamnt,$payback);
    }
    public function withdraw($paybackamnt,$payback){
        $Balance=$this->get_userdata($payback);
        if($paybackamnt>$Balance){
            return 'You do not have enough credit to pay back Loan!';
        }
        $Balance -= $paybackamnt;
        return $this->update_userdata($Balance,$payback);
    }
    public function payback($paybackamnt,$to,$from){
        $BalanceTo=$this->get_userdata($to);
        $BalanceFrom=$this->get_userdata($from);
        if ($BalanceFrom < $paybackamnt) {
            return "<div class='alert alert-danger'>You do not have enough credit to pay back Loan!</div></div>";
        }else{
            $newBalFrom = $BalanceFrom - $paybackamnt;
            $newBalTo = $BalanceTo + $paybackamnt;
            $this->db->trans_start();
            $this->update_userdata($newBalFrom,$from);
            $this->update_userdata($newBalTo,$to);
            $this->db->trans_complete();
        }
    	if($this->db->trans_status()===FALSE){
    	    return "<div class='alert alert-danger'>Error occurred causing Loan to be rolled back. Please try again later.</div></div>";
    	}else{
            $this->load->model("receive");
            if($this->receive->log_Loan($from,'payback',$paybackamnt,$to)){
                return "<div class='alert alert-success'>Loan complete. $paybackamnt Amount being processed.</div></div>";
            }
            return "<div class='alert alert-warning'>Loan complete. $paybackamnt amount is being processed and paybacked.</div></div>";
    	}
    }
