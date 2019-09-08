<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
   public function index()
   {
      return $this->load->view('v_masterpage');
   }
}