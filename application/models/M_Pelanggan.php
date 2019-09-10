<?php

class M_Pelanggan extends CI_Model
{
   
   function GetDataPelanggan()
   {
    return $this->db->get('pelanggan');
   }

}
