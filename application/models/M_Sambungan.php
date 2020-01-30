<?php 
class M_Sambungan extends CI_Model
{
   // Get Lokasi
   public function getdatapemohon()
   {
     return $this->db->get('t_pmh_sambungan');
   }

   public function getdatapemohonnonverifikasi()
   {
     return $this->db->get('t_pmh_plgn');
   }
   public function getperuntukan()
   {
      return $this->db->get('t_peruntukan');
   }
   public function getprovinsi()
   {
      return $this->db->get('t_provinsi');
   }
   public function getkotawhereprovince($id)
   {
     return $this->db->get_where('t_kota', array('id_provinisi' => $id));
   }
   public function getkecamatanwherekota($id)
   {
      return $this->db->get_where('t_kecamatan', array('id_kota' => $id));
   }
   public function getkelurahanwherekecamatan($id)
   {
      return $this->db->get_where('t_kelurahan',array('id_kecamatan' => $id));
   }
   public function getid_pmhswherenik($nik)
   {
      $this->db->from('t_pmh_sambungan');
      $this->db->select('*');
      $this->db->where('nik_pemohon', $nik);
      $this->db->order_by('nik_pemohon', 'DESC');
      $this->db->limit(1);
      return $this->db->get();
   }

   public function getdetailpelanggan($id)
   {
      $this->db->select('* , t_pmh_sambungan.alamat AS alamat_pmh,  t_pmh_plgn.alamat AS alamat_plgn, t_pmh_sambungan.telp1 AS telp1_pmh, t_pmh_sambungan.telp2 AS telp2_pmh');
      $this->db->from('t_pmh_sambungan');
      $this->db->join('t_pmh_plgn', 't_pmh_sambungan.id_pmh_sambungan = t_pmh_plgn.id_pmh_sambungan');
      $this->db->join('t_peruntukan', 't_pmh_plgn.id_peruntukan = t_peruntukan.id_peruntukan');
      $this->db->join('t_provinsi', 't_pmh_plgn.id_provinsi = t_provinsi.id_provinisi');
      $this->db->join('t_kota', 't_pmh_plgn.id_kota = t_kota.id_kota');
      $this->db->join('t_kecamatan', 't_pmh_plgn.id_kecamatan = t_kecamatan.id_kecamatan');
      $this->db->join('t_kelurahan', 't_pmh_plgn.id_kelurahan = t_kelurahan.id_kelurahan');
      $this->db->where('t_pmh_plgn.id_pmh_plgn', $id);
      return $this->db->get();
   }

   // Input Data
   public function inputdatapelanggan($data)
   {
      $this->db->insert('t_pmh_plgn',$data);
   }
   public function inputdatapemohon($data)
   {
      $this->db->insert('t_pmh_sambungan',$data);
   }
}
