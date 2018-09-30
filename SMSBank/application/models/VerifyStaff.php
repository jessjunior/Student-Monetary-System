<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyStaff extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->db->select('staff_id,staff_name');
		$this->db->from('staff');
		$this->db->where('deleted=0');
		return $this->db->get()->result();
	}

	public function get_unique($staff_id){
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where("staff_id=$staff_id and deleted=0");
		return $this->db->get()->row();
	}

	public function add_staff($name,$pass){
		$this->db->select('max(staff_id) as maxID');
		$this->db->from('staff');
		$staffID=$this->db->get()->row()->maxID+1;
		$data=array('staff_id'=>$staffID,'staff_name'=>$name,'Pass'=>$pass);
		return $this->db->insert("staff",$data,true);
	}

	public function update_staff_name($staff_id,$new_name){
		$data=array("staff_name"=>"$new_name");
		return $this->db->set($data)->where("staff_id=$staff_id")->update("staff",$data,1);
	}

	public function update_staff_pass($staff_id,$new_pass){
		$data=array("Pass"=>"$new_pass");
		return $this->db->set($data)->where("staff_id=$staff_id")->update("staff",$data,1);
	}

	public function delete_staff($staff_id){
		$data=array("deleted"=>1);
		return $this->db->set($data)->where("staff_id=$staff_id")->update("staff",$data,1);
	}
}
?>