<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan extends CI_Controller {
   public function __construct() {
      parent::__construct();		
      $this->load->model('M_Crud');
      $this->load->model('M_Penggunaan');
      $this->load->helper('url');
   }
   public function index()
   {
      $data['penggunaan']= $this->M_Penggunaan->GetPenggunaan()->result();
      return $this->load->view('v_penggunaan',$data);
   }
}