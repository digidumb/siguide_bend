<?php
class Itin_model extends CI_Model{
	var $tbname = 'tb_itin';
	
	function Itin_model(){
		parent::__construct();
	}
	
	function get($id) {
		$sql="SELECT * from $this->tbname where id = '$id'";
		$res = $this->db->query($sql);
		
		if ($res->num_rows() > 0) {
			return $res->row();
		}
	}
	
	function get_all() {
		$sql="SELECT * from $this->tbname";
		$res = $this->db->query($sql);
		
		if ($res->num_rows() > 0) {
			return $res->result();
		}
	}
	
	function get_by_criteria($criteria) {
		//to be implemented
	}
	
	function create($itin) {
		//to be implemented
		$this->db->insert($this->tbname, $itin); 
	}
	
	function update($id, $arr) {
		$this->db->where('id', $id);
		return $this->db->update($this->tbname, $arr);
	}
}
?>