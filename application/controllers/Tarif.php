<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller{   
   public function __construct() {
      parent::__construct();
      $this->load->model('M_Tarif');
      $this->load->model('M_Crud');
      $this->load->helper('url');	
      if($this->session->userdata('status') != "login"){
         if($this->session->userdata('status') != "login" && $this->session->userdata('id_level') != '2' || $this->session->userdata('id_level') != '5' ){
            redirect("Admin");
         }
      }
   }
   public function index()
   {
      $data['jaminan']  = $this->M_Tarif->getjaminan()->result();
      $data['tarif'] = $this->M_Tarif->GetJenisTarif()->result();
      return $this->load->view('v_tarif',$data);
   }  

   public function inputtarif()
   {
      $data = [ 
         'Golongan' => $this->input->post('golongan'),
         'daya' => $this->input->post('daya'),
         'tarifperkwh' => $this->input->post('tarif'),
         'harga_pasang' => $this->input->post('harga_pasang'),
         'id_harga_jaminan' => $this->input->post('jaminan'),
      ];

      $this->M_Crud->input($data, 'tarif');
      redirect('Tarif');
   }

   // GetModal for update
   // public function getupdate($id)
   // {
   //   $data = $this->M_Tarif->TarifById()->row_array();
   // }

   public function Delete($id)
   {
      $this->db->delete('tarif',['id_tarif' => $id]);
      
   }

   
}
