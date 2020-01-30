<?php
class LayananGerai extends CI_Controller 
{
   public function __construct() {
      parent::__construct();
      $this->load->model('M_Crud');	
      $this->load->model('M_Sambungan');
      $this->load->model('M_Tarif');
      $this->load->helper('url');
   } 

   function index(){
      $this->load->view('v_layanangerai');
   }

   public function daftargeraibaru()
   {
      return $this->load->view('v_daftargerai');
   }



   // INPUT DATA

   // INPUT PERMOHONAN
   public function inputPermohonan()
   {
      $datatoko = array(
         'nama_gerai' => $this->input->post('namagerai'),
         'alamat_gerai' => $this->input->post('alamat-gerai'),
         'nama_penanggungjawab' =>  $this->input->post('penanggungjawab'),
         'noktp_penanggungjawab' =>  $this->input->post('no_ktp'),
         'no_telp' => $this->input->post('notelp'),
         'status' =>  '0',
         'email' => $this->input->post('email'),
      );

      $this->M_Crud->input($datatoko,'t_gerai');
   }
}
