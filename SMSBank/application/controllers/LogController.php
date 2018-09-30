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
}
