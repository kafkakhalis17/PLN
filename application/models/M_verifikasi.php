<?php

class M_verifikasi extends CI_Model 
{
   public function verifikasisambungan($id,$data)
   {
      $this->db->where($id);
		$this->db->update('t_pmh_plgn',$data);
   }


   // get Pemohon
   public function getwhereterverifikasi($id)
   {
      return $this->db->get_where('t_pmh_sambungan', $id);
   }
   public function getpemohonpelanggan($idpelanggan)
   {
      $this->db->select('*');
      $this->db->from('t_pmh_plgn');
      $this->db->join('tarif t', 't.id_tarif = t_pmh_plgn.id_tarif');
      $this->db->join('t_peruntukan', 't_pmh_plgn.id_peruntukan = t_peruntukan.id_peruntukan');
      $this->db->join('t_provinsi', 't_pmh_plgn.id_provinsi = t_provinsi.id_provinisi');
      $this->db->join('t_kota', 't_pmh_plgn.id_kota = t_kota.id_kota');
      $this->db->join('t_kecamatan', 't_pmh_plgn.id_kecamatan = t_kecamatan.id_kecamatan');
      $this->db->join('t_kelurahan', 't_pmh_plgn.id_kelurahan = t_kelurahan.id_kelurahan');
      $this->db->where($idpelanggan);
      return $this->db->get();
   }
}

