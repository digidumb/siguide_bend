<?php
class Kec_model extends CI_Model{
	function Kec_model(){
		parent::__construct();
	}
	
	function get($id) {
		$sql="SELECT * from tb_kec where id = '$id'";
		$res = $this->db->query($sql);
		
		if ($res->num_rows() > 0) {
			return $res->row();
		}
	}
	
	function get_all() {
		$sql="SELECT * from tb_kec where id = '$id'";
		$res = $this->db->query($sql);
		
		if ($res->num_rows() > 0) {
			return $res->row();
		}
	}
	
	function update($id, $arr) {
		$this->db->where('id', $id);
		return $this->db->update('tb_kec', $arr);
	}
}
?>