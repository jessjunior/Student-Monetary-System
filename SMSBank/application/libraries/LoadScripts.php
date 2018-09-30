<?php
#this file loads all necessary links(css) and scripts.
defined('BASEPATH') OR exit('No direct script access allowed');
class LoadScripts {
	public function index(){
		return "<title>SMSBank</title><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><link rel='shortcut icon' type='image/png' href='<?php echo base_url();?>resources/favicon.png'><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'><link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css' integrity='sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU' crossorigin='anonymous'><link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet'><script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script><script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>";
	}

	public function datatable(){
		return "<link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'><script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script><script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>";
	}
}
?>