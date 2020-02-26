<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

 	function __construct() {
		parent::__construct();		
		$this->load->model('M_Pelanggan');
		$this->load->model('M_Crud');
		$this->load->model('M_Tarif');
		$this->load->helper('url');
		if($this->session->userdata('id_level') == '3' || $this->session->userdata('id_level') == '6' ){
			redirect("Admin");
		}
	}
	public function index()
	{
		$data['peruntukan'] = $this->db->get('t_peruntukan')->result();
		$data['tarif'] = $this->M_Tarif->GetJenisTarif()->result();
		$data['pelanggan'] = $this->M_Pelanggan->GetDataPelanggan()->result();
		$this->load->view('v_pelanggan',$data);
	}
	
	
	public function putussambungan()
	{
		$this->load->view('v_verifikasiputus');
	}


	public function getdetailmodal($nokwh)
	{
		$data = $this->db->get_where('pelanggan',['nomor_kwh' => $nokwh])->result();
      foreach ($data as $d ) {
         // $status = ($d->status == "402") ? "<div class='badge badge-success'>TERVERIFIKASI</div>" : "<div class='badge badge-warning'>BELUM TERVERIFIKASI</div>";
         echo $row = "<div class='row'> 
         <div class='col-xl-12'>
           <div class='widget-heading'>Data Pemohon</div>
           <div class='widget-subheading opacity-7'>ID PMH {$d->nomor_kwh}</div>
           <input type='hidden' id='idsambungan' value='{$d->nomor_kwh}'>
           <table class='table'>
             <tr>
               <td class='pr-4 pl-4'>Nama</td>
               <td>{$d->nama_pelanggan}</td>
               <td class='pr-4 pl-4'>NIK</td>
               <td>{$d->no_ktp}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Alamat</td>
               <td>{$d->alamat}</td>
               <td class='pr-4 pl-4'>Telp</td>
               <td>{$d->no_telp} / {$d->no_telp2}</td>
             </tr>
           </table>
         </div>
		 </div>";
		
      }
	}
	public function verifikasiputussambungan($nokwh)
	{
		$rowpelanggan = $this->M_Pelanggan->getpelangganwherekwh($nokwh)->row_array();
		if ($rowpelanggan['status'] == '401') {
			$status = [
				'status' => "402"
			];
			$this->db->update('pelanggan',$status,['nomor_kwh' => $nokwh]);
		}elseif ($rowpelanggan['status'] == '399') {
			$status = [
				'status' => "400"
			];
			$this->db->update('pelanggan',$status,['nomor_kwh' => $nokwh]);
		}
	
	}


	

   public function input()
   {
		$NoKwhP = $this->input->post('kwh');
		$NamaP = $this->input->post('nama');
		$AlamatP = $this->input->post('alamat');
		$TarifP = $this->input->post('tarif');

		$data = array(
			'nomor_kwh' => $NoKwhP,
			'no_telp' => $this->input->post('telp1'),
			'no_telp2' => $this->input->post('telp2'),
			'no_ktp' => $this->input->post('noktp'),
			'id_peruntukan' => $this->input->post('peruntukan'),
			'nama_pelanggan' => $NamaP,
			'alamat' => $AlamatP,
			'id_tarif'=>$TarifP,
			'npwp' => $this->input->post('npwp'),
			'status' => $this->input->post('status')
		);
		$this->M_Crud->input($data,'pelanggan');
		redirect('Pelanggan/index');
	}

	// Must Delete Form All table that Constraint this Table 
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

		$this->M_Crud->update_data($where, $data, 'pelanggan');
		redirect('Pelanggan/index');
	}

	public function getDataputus()
	{
		$this->db->where('status',401);
		$this->db->or_where('status',400);
		$this->db->or_where('status',399);
		$data = $this->db->get('pelanggan')->result();
		echo json_encode($data);
	}

}
