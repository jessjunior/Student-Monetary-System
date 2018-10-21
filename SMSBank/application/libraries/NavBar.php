<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NavBar {
	private $ci;
	public function __construct(){
		$this->ci=& get_instance();
	}
	public function admin_nav_bar(){
		return "<nav class='navbar bg-secondary navbar-expand-lg navbar-dark fixed-top' style='padding-top:2px;padding-bottom:2px;'><button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#smallScreen' style='outline: none;'><span class='navbar-toggler-icon'></span></button><div class='collapse navbar-collapse' id='smallScreen'><ul class='navbar-nav'><li class='nav-item'><a class='nav-link' href='".site_url("transaction_log")."'>Home</a></li></ul></div></nav>";
	}

	public function user_nav_bar(){
		return "<nav class='navbar bg-secondary navbar-expand-lg navbar-dark fixed-top' style='padding-top:2px;padding-bottom:2px;'><button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#smallScreen' style='outline: none;'><span class='navbar-toggler-icon'></span></button><div class='collapse navbar-collapse' id='smallScreen'><ul class='navbar-nav'><li class='nav-item'><a class='nav-link' href='".site_url("transaction_log/get_log")."'>Home</a></li></ul></div></nav>";
	}
}

?>