<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

 	function __construct() {
		parent::__construct();		
		$this->load->model('M_Pelanggan');
		$this->load->model('M_Pembayaran');
		$this->load->helper('url');
	}
	public function index()
	{
		if ($this->session->userdata('status') == "login" && $this->session->userdata('id_level') == '2' || $this->session->userdata('status') == "login" && $this->session->userdata('id_level') == '5' || $this->session->userdata('status') == "login" && $this->session->userdata('id_level') == '6' || $this->session->userdata('status') == "login" && $this->session->userdata('id_level') == '3') {
			$data['currentbayar'] = $this->M_Pembayaran->currentbayar()->result();
 			// Data Jumlah Status Pelanggan
			$data['sts_putus'] = $this->M_Pelanggan->Getpelangganputus();
			$data['sts_lunas'] = $this->M_Pelanggan->Getpelangganlunas();
			$data['sts_unpaid'] = $this->M_Pelanggan->Getpelangganunpaid();
			$this->load->view('Dashboard-admin',$data);
		}
		else{
			$this->load->view('Dashboard_tamu');
		}
	
	}
	function tamu(){
		$this->load->view('Dashboard_tamu');
	}

}
