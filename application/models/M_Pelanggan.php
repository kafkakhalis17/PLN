<?php

class M_Pelanggan extends CI_Model
{
   
   function GetDataPelanggan()
   {
      $this->db->select('*');
      $this->db->from('pelanggan');
      $this->db->join('tarif','pelanggan.id_tarif=tarif.id_tarif');
      return $this->db->get();
   }

   function Getpelangganputus()
   {
      $this->db->select('*');
      $this->db->from('pelanggan');
      $this->db->join('tarif','pelanggan.id_tarif=tarif.id_tarif');
      $this->db->where('pelanggan.status', '400');
      return $this->db->get()->num_rows();
   }

   function Getpelangganlunas()
   {
      $this->db->select('*');
      $this->db->from('pelanggan');
      $this->db->join('tagihan','pelanggan.id_pelanggan = tagihan.id_pelanggan');
      $this->db->where('tagihan.status', 'Lunas');
      $this->db->where('tagihan.bulan',date('F'));
      $this->db->where('tagihan.tahun',date('Y'));
      return $this->db->get()->num_rows();
   }

   function Getpelangganunpaid()
   {
      $this->db->select('*');
      $this->db->from('pelanggan');
      $this->db->join('tagihan','pelanggan.id_pelanggan = tagihan.id_pelanggan');
      $this->db->where('tagihan.status', 'Lunas');
      $this->db->where('tagihan.bulan',date('F'));
      $this->db->where('tagihan.tahun',date('Y'));
      $this->db->or_where('tagihan.status', 'nunggak');
      $this->db->group_by("nomor_kwh");
      return $this->db->get()->num_rows();
   }

   public function listingpenggunaan() {
      $this->db->select('*');
      $this->db->from('pelanggan p');
      $this->db->group_by("nomor_kwh");
      $this->db->join('penggunaan pg', 'p.id_pelanggan=pg.id_pelanggan', 'left'); 
      $query = $this->db->get();
      return $query->result();
   }


}
