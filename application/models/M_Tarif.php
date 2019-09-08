<?php

class M_Tarif extends CI_Model
{
   
   function GetJenisTarif()
   {
      return $this->db->get('tarif');
   }
   
}