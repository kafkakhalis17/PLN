   <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan extends CI_Controller {
   private $filename = "import_data"; 
   public function __construct() {
      parent::__construct();		
      $this->load->model('M_Crud');
      $this->load->model('M_Penggunaan');
      $this->load->model('M_Pelanggan');
      $this->load->model('M_Tagihan');
      $this->load->helper('url');
      if($this->session->userdata('id_level') == '3' || $this->session->userdata('id_level') == '6' ){
			redirect("Admin");
		} 
   }
   public function index()
   {
      $data['Pelanggan'] = $this->M_Pelanggan->GetDataPelanggan()->result();
      $data['penggunaan']= $this->M_Penggunaan->GetPenggunaan()->result();
      $data['idPelanggan'] = $this->M_Penggunaan->GetPelangganByPenggunaan()->result();
      return $this->load->view('v_penggunaan',$data);
   }

   public function inputNewPenggunaan()
   {
      $IDPelanggan = $this->input->post('pelanggan');
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $m_awal = $this->input->post('m-awal');
      $m_akhir = $this->input->post('m-akhir');

      $data = array(
         'id_pelanggan' => $IDPelanggan,
         'bulan' => $bulan,
         'tahun' => $tahun,
         'meter_awal'=>$m_awal,
         'meter_akhir'=>$m_akhir
      );
    
      $this->M_Penggunaan->inputPenggunaan($data);
      redirect('Penggunaan/index');
      
      
   }

   public function updatePenggunaan()
   {
      $IDPelanggan = $this->input->post('pelanggan');
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $m_awal = $this->input->post('m-awal');
      $m_akhir = $this->input->post('m-akhir');
    
      $data = array(
         'id_pelanggan' => $IDPelanggan,
         'bulan' => $bulan,
         'tahun' => $tahun,
         'meter_awal'=>$m_awal,
         'meter_akhir'=>$m_akhir
      );
      $date = new DateTime();
      $Currentmonth = $date->format('M');
      $Currentyear = $date->format('Y');
      // DISABLE FILTER FOR CONTROLLERSS
      // $CekPgn =  $this->db->query("SELECT bulan, tahun FROM penggunaan WHERE id_pelanggan={$IDPelanggan}")->result();
      // foreach ($CekPgn as $p) {
      //    if ($p->bulan==$bulan&&$p->tahun==$tahun) {
      //       $result['pesan']="Penggunaan pada Bulan dan Tahun ini sudah diinput";
      //       echo json_encode($result);
      //    }else {
            $this->M_Penggunaan->inputPenggunaan($data);
            // $result['pesan']="";
            // echo json_encode($result);
         // }
      //    }
      redirect('penggunaan');      
   }

  
   public function update()
   {
      $id = $this->input->post('id');
      $IDPelanggan = $this->input->post('pelanggan');
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $m_awal = $this->input->post('m-awal');
      $m_akhir = $this->input->post('m-akhir');

      $data = array(
         'id_pelanggan' => $IDPelanggan,
         'bulan' => $bulan,
         'tahun' => $tahun,
         'meter_awal'=>$m_awal,
         'meter_akhir'=>$m_akhir
      );
      $where = array(
			'id_penggunaan' => $id
      );
      $this->M_Crud->update_data($where,$data,'penggunaan');
		redirect('Penggunaan/index');
   }


   public function Delete($id)
	{
      $where = array('id_penggunaan' => $id);
      $this->M_Crud->hapus_data($where,'tagihan');
      $this->M_Crud->hapus_data($where,'penggunaan');
		redirect('Penggunaan/index');
   }
   
   // JSON Data
   public function JsonGetPenggunaan()
   {
      $data= $this->M_Penggunaan->GetPenggunaan()->result();
      echo json_encode($data);
   }
   public function GetPenggunaanID($id)
   {
      $data=$this->M_Penggunaan->GetPenggunaanWhereID($id)->result();
      echo json_encode($data);
   }
   public function getDatabaru()
   {
      $data = $this->M_Penggunaan->GetPenggunaanBaru()->result();
      echo json_encode($data);
   }
   public function getDatabaruByID($id)
   {
      $data = $this->M_Penggunaan->GetPenggunaanBaruByID($id)->result();
      echo json_encode($data);
   }
   public function GetDate()
   {
      $where = array(
         'id_pelanggan' => $this->input->post('idPelanggan'),
         'tahun' => $this->input->post('tahun')
         // 'id_pelanggan' => 5,
         // 'tahun' => 2019
      );
      $data = $this->M_Penggunaan->GetDateByID($where)->result();
      echo json_encode($data);
   }

   public function ValidateImport(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
         // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->M_Penggunaan->upload_file($this->filename);
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
            $data['sheet'] = $sheet; 
            $this->load->view('v_importpenggunaan', $data);
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
	
   }
   public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
            $row_plgn = $this->M_Pelanggan->getpelangganwherekwh($row['A'])->row_array();
            $numpenggunaan =  $this->M_Penggunaan->GetPenggunaanBaruByID($row_plgn['id_pelanggan'])->num_rows();
            $penggunaan =  $this->M_Penggunaan->GetPenggunaanBaruByID($row_plgn['id_pelanggan'])->row_array();
            // Cek jika Peggunaan Sudah ada maka ambil dari meter akhir jika belum maka keluarkan angka 0
            $meterawal = $numpenggunaan > 0 ? $penggunaan['meter_akhir'] : "0"; 
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'id_pelanggan'=>$row_plgn['id_pelanggan'], // Insert data nis dari kolom A di excel 
					'bulan'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
               'tahun'=>$row['D'], // Insert data alamat dari kolom D di excel
               'meter_awal' => $meterawal,
               'meter_akhir' => $row['E']
				));
			}
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
      $this->M_Penggunaan->insert_multiple($data);
		redirect("Penggunaan"); // Redirect ke halaman awal (ke controller siswa fungsi index)
   }
   
   
   public function export_excel(){
      $data = array( 
      'title' => 'Format Penggunaan',
      'data' => $this->M_Pelanggan->listingpenggunaan());
      $this->load->view('v_excelpenggunaan',$data);
   }


   
}