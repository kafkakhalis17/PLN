<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

 	function __construct() {
		parent::__construct();		
		$this->load->model('M_Pelanggan');
		$this->load->model('M_Crud');
		$this->load->model('M_Tarif');
		$this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['tarif'] = $this->M_Tarif->GetJenisTarif()->result();
		$data['pelanggan'] = $this->M_Pelanggan->GetDataPelanggan()->result();
		$this->load->view('v_pelanggan',$data);
   }
   public function input()
   {
		$NoKwhP = $this->input->post('kwh');
		$NamaP = $this->input->post('nama');
		$AlamatP = $this->input->post('alamat');
		$TarifP = $this->input->post('tarif');

		$data = array(
			'nomor_kwh' => $NoKwhP,
			'nama_pelanggan' => $NamaP,
			'alamat' => $AlamatP,
			'id_tarif'=>$TarifP
		);
		$this->M_Crud->input($data,'pelanggan');
		redirect('Pelanggan/index');
	}
	public function Delete($id)
	{
		$where = array('id_pelanggan' => $id);
		$this->M_Crud->hapus_data($where,'pelanggan');
		redirect('Pelanggan/index');
	}
	public function Update()
	{
		$id = $this->input->post('id');
		$NoKwhP = $this->input->post('kwh');
		$NamaP = $this->input->post('nama');
		$AlamatP = $this->input->post('alamat');
		$TarifP = $this->input->post('tarif');

		
		$data = array(
			'nomor_kwh' => $NoKwhP,
			'nama_pelanggan' => $NamaP,
			'alamat' => $AlamatP,
			'id_tarif'=>$TarifP
		);

		$where = array(
			'id_pelanggan' => $id
		);

		$this->M_Crud->update_data($where,$data,'pelanggan');
		redirect('Pelanggan/index');
	}

}
