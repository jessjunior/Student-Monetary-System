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
				$this->session->set_flashdata("log","<div class='container'><div class='container alert alert-danger'>Invalid Account Number or ID</div></div>");
			}
		}
		redirect(base_url(),"location");
	}
}