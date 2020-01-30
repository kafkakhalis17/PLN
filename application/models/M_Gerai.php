<?php 
class M_Gerai extends CI_Model
{
   // get
   public function getneedverifikasi(Type $var = null)
   {
      return $this->db->get_where('t_gerai', ['status' => '0']);
   }
   public function getgeraiwhereid($id)
   {
      return $this->db->get_where('t_gerai', ['id_gerai' => $id]);
   }
}
