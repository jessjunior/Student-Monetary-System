<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetLog extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->db->select('log.Log_ID,fJoin.Name as tName,accounts.Name as rName,log.Transactions,log.Amount,log.Time');
		$this->db->from('log');
		$this->db->join('accounts fJoin', 'log.Acc_No = fJoin.Acc_No','left');
		$this->db->join('accounts', "log.`To/From`=accounts.Acc_No",'left');
		return $this->db->get()->result();
	}

	public function log_transaction($source,$transaction,$amount,$recipient="N/A"){
		if($recipient==="N/A"){
			$recipient=$source;
		}
		$this->db->select('max(Log_ID) as maxID');
		$this->db->from('log');
		$logID=$this->db->get()->row()->maxID+1;
		$data=array('Log_ID'=>$logID,'Acc_No'=>$source,'`To/From`'=>$recipient,'Transactions'=>$transaction,'Amount'=>$amount);
		return $this->db->insert("log",$data,true);
	}

	public function get_unique($acc_no){
		$this->db->select('log.Log_ID,fJoin.Name as tName,accounts.Name as rName,log.Transactions,log.Amount,log.Time');
		$this->db->from('log');
		$this->db->join('accounts fJoin', 'log.Acc_No = fJoin.Acc_No','left');
		$this->db->join('accounts', "log.`To/From`=accounts.Acc_No",'left');
		$this->db->where("log.Acc_No=$acc_no or log.`To/From`=$acc_no");
		return $this->db->get()->result();
	}
}