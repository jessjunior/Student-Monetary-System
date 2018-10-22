<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("transaction");
		$this->load->model("getlog");
		$this->load->model("verifyusers");
		if(!isset($_POST['amount'])) redirect(site_url("transaction_log/get_log"),"location");
	}

	public function index(){
		if(!isset($_POST['to'])) redirect(site_url("transaction_log/get_log"),"location");
		if(is_object($this->verifyusers->get_unique($_POST['to']))){
			$return=$this->transaction->transfer($_POST['amount'],$_POST['to'],$this->session->userdata("accountnumber"));
			$this->session->set_flashdata('log',$return);
		}else{
			$this->session->set_flashdata('log',"<div class='alert alert-danger'>".$_POST['to']." account number was not found in our databases thus transaction failed.</div>");
		}
		redirect(site_url("transaction_log/get_log"),"location");
	}

	public function deposit(){
		if($this->transaction->deposit($_POST['amount'],$this->session->userdata("accountnumber"))){
			if($this->getlog->log_transaction($this->session->userdata("accountnumber"),'Deposit',$_POST['amount'])){
				$this->session->set_flashdata('log',"<div class='alert alert-success'>".$_POST['amount']." Credited to your account and transaction has been logged.</div>");
			}else{
				$this->session->set_flashdata('log',"<div class='alert alert-warning'>".$_POST['amount']." Credited to your account but logging has failed. Please not there exists no data in the system to verify that this transaction occurred.</div>");
			}
			redirect(site_url("transaction_log/get_log"),'location');
		}
		redirect(base_url(),'location');
	}

	public function withdraw(){
		$trans=$this->transaction->withdraw($_POST['amount'],$this->session->userdata("accountnumber"));
		if($trans==='invalid funds'){
			$this->session->set_flashdata('log',"<div class='alert alert-danger'>Not enough funds in your account to complete this transaction.</div>");
			redirect(site_url("transaction_log/get_log"),'location');
		}else if($trans){
			if($this->getlog->log_transaction($this->session->userdata("accountnumber"),'Withdraw',$_POST['amount'])){
				$this->session->set_flashdata('log',"<div class='alert alert-success'>".$_POST['amount']." Debitted from your account and transaction has been logged.</div>");
			}else{
				$this->session->set_flashdata('log',"<div class='alert alert-warning'>".$_POST['amount']." Debitted from your account but logging has failed. Please not there exists no data in the system to verify that this transaction occurred.</div>");
			}
			redirect(site_url("transaction_log/get_log"),'location');
		}
		redirect(base_url(),'location');
	}
}
?>