<?php
class Pembayaran extends CI_Controller 
{

    public function __construct() {
        parent::__construct();		
        $this->load->model('M_Crud');
        $this->load->model('M_Pembayaran');
        $this->load->helper('url');
        $this->load->model('M_verifikasi');
      //   if($this->session->userdata('status') != 'login'){
		// 	   redirect("Dashboard");
		//    } 
      }
    public function index()
    {
        $this->load->view('v_pembayaran');
    }
    public function bayarpemasangan()
    {
       $this->load->view('v_bayarpasangbaru');
    }
   //  Pencarian Bayaran Bulanan
    public function CariPembayaran($noKwh)
    {
       $data = $this->M_Pembayaran->GetByKWh($noKwh)->result();
       echo json_encode($data);
    }
   // Pencarian Bayaran Pasang Baru
    public function caripembayaranpasangbaru($code)
    {
      $data = $this->M_Pembayaran->getbayarpasangabaru($code)->row_array();
      if ($data == null) {
         echo  "<p class='text-center text-danger'>Code Salah</p>";
      }else {
         echo $row = '<div class="form-row">
         <div class="col-12">
            <label  for="">Nama Pemohon : </label>
            <span style="margin-left:60px" id="namapemohon">'.$data['nama_pmh'].'</span>
         </div>
      </div>
      <div class="form-row">
         <div class="col-12">
            <label  for="">Nama Pelanggan :</label>
            <span style="margin-left:54px" id="namapemohon">'.$data['nama'].'</span>
         </div>
      </div>
      <div class="form-row">
         <div class="col-12">
            <h4>Total Pembayaran</h6>
         </div>
      </div>
      <div class="form-row">
         <div class="col-12"> 
            <span>Rupiah jaminan Pemasanagan</span>
            <span style="margin-left:130px"> Rp.' .number_format($data['jaminan'],2,',','.').'</span>
         </div>
      </div>
      <div class="form-row">
         <div class="col-12"> 
            <span>Rupiah Jasa Pemasangan</span>
            <span style="margin-left:175px"> Rp.'.number_format($data['harga_pasang'],2,',','.').'</span>
         </div>
      </div>
      <div class="form-row">
         <div class="col-12"> 
            <span>Biaya Admin</span>
            <span style="margin-left:100px"> Rp.'.number_format("2500",2,',','.').'</span>
         </div>
      </div>
      <div class="form-row">
         <div class="col-12"> 
            <span>Estimasi Total yang harus dibayar</span>
            <span style="margin-left:100px"> Rp.'.number_format($data['harga_pasang']+$data['jaminan']+2500,2,',','.').'</span>
         </div>
      </div>
      
      <div class="row">
         <div class="col-12">
            <button onclick="ProsesPayment()" class="btn btn-success btn-lg float-right mt-5">Proses pembayaran</button>
         </div>
      </div>';
      }
    }

   //  Proses Pembayaran Pasang Baru
   public function prosespembayaranpasangbaru($code)
   {
      $row = $this->M_Pembayaran->getbayarpasangabaru($code)->row_array();
      $data = array(
         'status' => "2",
         'tanggal_validate' => Date('Y-m-d')
       );
       $where = array(
         'id_pmh_plgn' => $row['id_pmh_plgn']
       );
       // Update Status verifikasi
       $this->M_verifikasi->verifikasisambungan($where,$data);
       
       $datatransaksi = [
          'id_admin' => $this->session->userdata('id'),
          'id_pmh_plgn' => $row['id_pmh_plgn'],
          'tanggal_bayar' => date("Y-m-d")
       ];
       $this->M_Crud->input($datatransaksi,'t_transaksipemohon');
       $this->M_Crud->hapus_data(['kode_unik' => $code], 't_kodepembayarandaftar');
   }

    public function Bayar()
    {
      $id = $this->input->post('id_tagihan');
      $IDPelanggan = $this->input->post('id_pelanggan');
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $tanggalBayar = $this->input->post('tanggalB');
      $idAdmin = $this->session->userdata('id');

      $data = array(
        'id_tagihan' => $id,
        'id_pelanggan' => $IDPelanggan,
        'bulan_bayar' => $bulan,
        'tahun' => $tahun,
        'tanggal_pembayaran'=>$tanggalBayar,
        'id_admin' => $idAdmin
     );
    

     $dataUpTagihan = array(
        'status' => "Lunas"
     );

     $where = array(
        'id_tagihan' => $id
     );
   
     $this->M_Crud->input($data,'pembayaran');
     $this->M_Crud->update_data($where,$dataUpTagihan,'tagihan');
   
    }

    // Mencari Bulan
    public function CariPembayaranById($noid)
    {
       $data = $this->M_Pembayaran->GetByID($noid)->result();
       echo json_encode($data);
    }
}
