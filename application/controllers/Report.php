<?php 
class Report extends CI_Controller 
{
   public function __construct() {
      parent::__construct();
      $this->load->model('M_Crud');	
      $this->load->model('M_Tagihan');
      $this->load->model('M_Tarif');
      $this->load->model('M_Crud');
      $this->load->model('M_Pelanggan');
      $this->load->helper('url');
   }

   public function index()
   {
      if($this->session->userdata('id_level') == '3' || $this->session->userdata('id_level') == '6' ){
         redirect("Admin");
     }else{
      
         $data['tagihan'] = $this->M_Tagihan->GetvTagihan()->result();
         return $this->load->view('v_report');
     }
     
   }
}
