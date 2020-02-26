<?php

class LayananPelanggan extends CI_Controller 
{
   public function __construct() {
      parent::__construct();
      $this->load->model('M_Crud');	
      $this->load->model('M_Sambungan');
      $this->load->model('M_Tarif');
      $this->load->helper('url');
   }
   function index(){
      $this->load->view('v_layananpelanggan');
   }
   function daftarsambunganbaru(){
      $data['peruntukan'] = $this->M_Sambungan->getperuntukan()->result();
      $data['daya'] = $this->M_Tarif->GetJenisTarif()->result();
      $data['provinsi'] = $this->M_Sambungan->getprovinsi()->result();
      $this->load->view('v_sambunganbaru',$data);
   }

   public function putussambungan()
   {
      $this->load->view('v_putussambungan');
   }


   // Input data 
   public function inputPermohonan()
   {
      $nik = $this->input->post('noktp_pemohon');
      $telp1 = $this->input->post('notelp1_pmh');
      $telp2 = $this->input->post('notelp2_pmh');
      $datapemohon = array(
         'nama_pmh' => $this->input->post('nama_pemohon'),
         'alamat' => $this->input->post('alamat_pmh'),
         'telp1' =>   $telp1,
         'telp2' => $telp2,
         'nik_pemohon' =>  $nik,
         'email' => $this->input->post('email-pemohon'),
      );
      $this->M_Sambungan->inputdatapemohon($datapemohon);
      // $nik = $this->input->post('noktp_pemohon');
      $row_pmhs = $this->M_Sambungan->getid_pmhswherenik($nik)->row_array();
      
         $datapelanggan = array(
            'nama' => $this->input->post('nama_plgn'),
            'id_pmh_sambungan' => $row_pmhs['id_pmh_sambungan'],
            'npwp' => $this->input->post('npwp-plgn'),
            'id_provinsi' => $this->input->post('provinsi'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'id_kelurahan' => $this->input->post('desa'),
            'alamat' => $this->input->post('alamat-pelanggan'),
            'no_telp' =>  $this->input->post('notelp1'),
            'no_telp2' => $this->input->post('notelp2'),
            'no_ktp' => $this->input->post('noktp'),
            'id_tarif' => $this->input->post('daya'),
            'nama_npwp' => $this->input->post('nama-npwp'),
            'alamat_npwp' => $this->input->post('alamat-npwp'),
            'keperluan' => $this->input->post('keperluan'),
            'id_peruntukan' => $this->input->post('peruntukan'),
            // 'jumlah_pemasangan' => $this->input->post('banyak-daya'),
            'status' => "0"
         );
      $this->M_Sambungan->inputdatapelanggan($datapelanggan);
    }
   // Request putus sambungan
   public function putussambunganinput()
   {
      $nokwh = $this->input->post('nokwh');

      $updatestatus = [
       'status' => 401 
      ];
      $this->M_Crud->update_data(['nomor_kwh' => $nokwh],$updatestatus,'pelanggan');
   }


   // JSON DATA
   public function JsonGetKotaWhereid($id)
   {
      $data = $this->M_Sambungan->getkotawhereprovince($id)->result();
      echo json_encode($data);
   }
   public function JsonGetKecamatanWhereid($id)
   {
      $data = $this->M_Sambungan->getkecamatanwherekota($id)->result();
      echo json_encode($data);
   }

   public function JsonGetKeluruhanWhereid($id)
   {
      $data = $this->M_Sambungan->getkelurahanwherekecamatan($id)->result();
      echo json_encode($data);
   }

   public function carikwh($kwh)
   {
      $this->db->where('nomor_kwh',$kwh);
      $this->db->limit("1");
      $data = $this->db->get('pelanggan')->result();
      echo json_encode($data);
   }


   // Debug echo
   public function DebugEcho()
   {
      $nik = "1234567890123456";
      $row = $this->M_Sambungan->getid_pmhswherenik($nik)->row_array();
      echo $row['id_pmh_sambungan'];
   }
}
