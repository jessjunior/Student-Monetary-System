<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyUsers extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->db->select("*");
		$this->db->from('accounts');
		$this->db->where('deleted=0');
		return $this->db->get()->result();
	}

	public function get_unique($acc_no){
		$this->db->select('*');
		$this->db->from('accounts');
		$this->db->where("acc_no='$acc_no' and deleted=0");
		return $this->db->get()->row();
	}

	public function add_acc($name,$type,$balance,$pass){
		$this->db->select('max(Acc_No) as maxID');
		$this->db->from('accounts');
		$acc_no=$this->db->get()->row()->maxID+1;
		$data=array('Acc_No'=>$acc_no,'Name'=>$name,'Type'=>$type,'Balance'=>$balance,'Pin'=>$pass);
		if($this->db->insert("accounts",$data,true)){
			return $acc_no;
		}
		return false;
	}

	public function update_account_name($acc_no,$new_name){
		$data=array("Name"=>"$new_name");
		return $this->db->set($data)->where("Acc_No",$acc_no)->update("accounts");
	}

	public function update_account_pass($acc_no,$new_pass){
		$data=array("Pin"=>"$new_pass");
		return $this->db->set($data)->where("Acc_No",$acc_no)->update("accounts");
	}

	public function update_account_type($acc_no,$new_type){
		$data=array("Type"=>"$new_type");
		return $this->db->set($data)->where("Acc_No",$acc_no)->update("accounts");
	}

	public function delete_account($acc_no){
		$data=array("deleted"=>1);
		return $this->db->set($data)->where("Acc_No",$acc_no)->update("accounts");
	}
}
?>