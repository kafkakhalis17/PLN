<?php
class M_Crud extends CI_Model
{
   function input($data,$table){
		$this->db->insert($table,$data);
   }
   function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
   }
   function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
	function updateStatus($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}


