<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $this->load->model('M_Crud');	
      $this->load->model('M_Tagihan');
      $this->load->model('M_Tarif');
      $this->load->helper('url');
      if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}
  }

   public function index()
   {
      return $this->load->view('v_masterpage');
   }
}