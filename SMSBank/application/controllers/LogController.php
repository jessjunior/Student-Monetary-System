<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogController extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->model('getlog');
		$data['t_log']=$this->getlog->index();
		$data['links']=$this->loadscripts->index();
		$data['datatable']=$this->loadscripts->datatable();
		$this->load->view('showlog',$data);
	}

	public function db_transaction_log($source,$transaction,$amount){
		$this->load->model('getlog');
		return $this->getlog->log_transaction($source,$transaction,$amount);
	}
}
