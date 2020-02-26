<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

 	function __construct() {
		parent::__construct();		
		$this->load->model('M_Pelanggan');
		$this->load->model('M_Pembayaran');
		$this->load->model('M_Gerai');
		$this->load->helper('url');
	}
	public function index()
	{
		if ($this->session->userdata('status') == "login" && $this->session->userdata('id_level') == '2' || $this->session->userdata('status') == "login" && $this->session->userdata('id_level') == '5' || $this->session->userdata('status') == "login" && $this->session->userdata('id_level') == '6' || $this->session->userdata('status') == "login" && $this->session->userdata('id_level') == '3') {
			// activitaas Pembayaran Bulan ini 
			$data['currentbayar'] = $this->M_Pembayaran->currentbayar()->result();
			// Histori Pembayaran Gerai
			$data['historigerai'] = $this->M_Pembayaran->historibulanangerai($this->session->userdata('id'))->result();
			// Akrifitas Gerai
			// $data['aktifitasgerai'] = $this->M_Gerai->GeraiAktif()->result();
			$rowgerai = $this->M_Gerai->GeraiAktif()->result();
			foreach ($rowgerai as $gerai){
				$numgerai = $this->M_Gerai->GeraiAktifbyid($gerai->id_gerai)->num_rows();
				if ($numgerai > 0) {
					$geraiaktbulanan = $this->M_Gerai->pembayaranbulananbygerai($gerai->id_gerai)->row_array();
					$geraiaktpasangbaru = $this->M_Gerai->pembayaranpasangbygerai($gerai->id_gerai)->row_array();
					$geraiaktif = array();
					array_push($geraiaktif,
						[
							'namagerai' => $gerai->nama_gerai,
							'lokasi' => $gerai->alamat_gerai,
							'jumlahaktifitas' => $geraiaktbulanan['aktifitasbulanan'] + $geraiaktpasangbaru['aktifitaspasang'],
							'idgerai' => $gerai->id_gerai 
						]
					);
					
				}
			}
 			// Data Jumlah Status Pelanggan
			$data['sts_putus'] = $this->M_Pelanggan->Getpelangganputus();
			$data['sts_lunas'] = $this->M_Pelanggan->Getpelangganlunas();
			$data['sts_unpaid'] = $this->M_Pelanggan->Getpelangganunpaid();
			$data['geraiaktif'] = $geraiaktif;
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
