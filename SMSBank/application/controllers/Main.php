<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->session->unset_userdata("accountnumber");
		$this->load->view("log_in");	
	}

	public function login(){
		if(isset($_POST['acc'])){
			$this->load->model("verifystaff");
			$data=$this->verifystaff->get_unique($_POST['acc']);
			if(is_object($data)){
				if($data->Pass===$_POST['pass']){
					$this->session->set_userdata("accountnumber",$_POST['acc']);
					redirect(site_url("transaction_log"),"location");
				}else{
					$this->session->set_flashdata("log","<div class='container'><div class='container alert alert-danger'>Invalid Password</div></div>");
				}
			}else{
				$this->load->model("verifyusers");
				$data=$this->verifyusers->get_unique($_POST['acc']);
				if(is_object($data)){
					if($data->Pin===$_POST['pass']){
						$this->session->set_userdata("accountnumber",$_POST['acc']);
						redirect(site_url("transaction_log/get_log"),"location");
					}else{
						$this->session->set_flashdata("log","<div class='container'><div class='container alert alert-danger'>Invalid Password</div></div>");
					}
				}else{
					$this->session->set_flashdata("log","<div class='container'><div class='container alert alert-danger'>Invalid Account Number or ID</div></div>");
				}
			}
		}
		redirect(base_url(),"location");
	}

	public function reset_password(){
		$newPass=random_int(1000,9999);
		if(!isset($_POST['acc_no'])) redirect(base_url(),"location");
		$this->load->model("verifyusers");
		if($this->verifyusers->update_account_pass($_POST['acc_no'],$newPass)) 
			$this->session->set_flashdata('log',"<div class='container'><div class='container alert alert-success'>Pin for account number ".$_POST['acc_no']." changed to ".$newPass."</div></div>");
		else 
			$this->session->set_flashdata('log',"<div class='container'><div class='container alert alert-danger'>Password not changed.</div></div>");
		redirect(base_url(),"location");
	}
}