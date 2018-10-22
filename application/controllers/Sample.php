<?php
defined("BASEPATH") or exit("No Direct access to scripts allowed");

class Sample extends CI_Controller{
	public function index()
	{
		$this->load->view("welcome_message");
	}
}
	
?>