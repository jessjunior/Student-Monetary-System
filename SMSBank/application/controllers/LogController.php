<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogController extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('accountnumber')===null){
			redirect(base_url(),"location");
		}
		$this->load->model('getlog');
		$data['t_log']=$this->getlog->index();
		$data['links']=$this->loadscripts->index();
		$data['datatable']=$this->loadscripts->datatable();
		$data['nav']=$this->navbar->admin_nav_bar();
		$this->load->view('show_log',$data);
	}

	public function get_unique_log(){
		if($this->session->userdata('accountnumber')!==null){
			$this->load->model('getlog');
			$this->load->model("verifyusers");
			$data['t_log']=$this->getlog->get_unique($this->session->userdata('accountnumber'));
			$data['links']=$this->loadscripts->index();
			$data['datatable']=$this->loadscripts->datatable();
			$data['nav']=$this->navbar->user_nav_bar();
			$data['userdata']=$this->verifyusers->get_unique($this->session->userdata('accountnumber'));
			$this->load->view('show_unique_log',$data);
			return;
		}
		redirect(base_url(),"location");
	}
}
?>