<?php
class M_Penggunaan extends CI_Model{
    
   function GetPenggunaan()
   {
    return $this->db->get('penggunaan');
   }
}