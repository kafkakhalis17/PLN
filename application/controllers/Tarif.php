<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controllers{   
   public function __construct() {
   parent::__construct();
   $this->load->model('M_Tarif');
   $this->load->helper('url');		
   }


   
}
