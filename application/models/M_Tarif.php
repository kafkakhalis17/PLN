<?php

class M_Tarif extends CI_Model
{
   
   function GetJenisTarif()
   {
      return $this->db->get('tarif');
   }
   public function getjaminan()
   {
     return $this->db->get('t_harga_jaminan');
   }
   public function TarifById($where)
   {
    return $this->db->query("SELECT tarifperkwh FROM tarif WHERE id_tarif={$where}");
   }

   

   
}