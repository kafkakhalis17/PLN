<?php

class Gerai extends CI_Controller 
{
   public function __construct() {
      parent::__construct();
      $this->load->model('M_Crud');	
      $this->load->model('M_Gerai');	
      $this->load->model('M_Pembayaran');
      $this->load->helper('url');
      $this->load->helper('string');
      $this->load->library('Pdf');
   }
   public function index()
   {
     $data['gerai'] = $this->M_Gerai->getGerai()->result();
     $this->load->view('v_gerai', $data);
   }
   // view permintaan atau verifikasi
   public function permintaan()
   {
      if ( $this->session->userdata('id_level') == '2' ||  $this->session->userdata('id_level') == '5') {
        return $this->load->view('v_permintaangerai');
		}
		else{
      redirect('Dashboard');
		}
   }
   
   public function unverifikasi($id)
   {
       $rowgerai = $this->M_Gerai->getgeraiwhereid($id)->row_array();
       // UNVERIFIKASSI EMAIL
       $config = [
         'mailtype'  => 'html',
         'charset'   => 'utf-8',
         'protocol'  => 'smtp',
         'smtp_host' => 'smtp.gmail.com',
         'smtp_user' => 'khaliskafka17@gmail.com',  // Email gmail
         'smtp_pass'   => 'kafkakhaliskurniawan170506022',  // Password gmail
         'smtp_crypto' => 'ssl',
         'smtp_port'   => 465,
         'crlf'    => "\r\n",
         'newline' => "\r\n"
     ];
     $this->load->library('email', $config);

       // Email dan nama pengirim
       $this->email->from('no-reply@webpln.com', 'PLN INDONESIA');

       // Email penerima
       $this->email->to($rowgerai['email']); // Ganti dengan email tujuan

       // Lampiran email, isi dengan url/path file
       // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

       // Subject email
       $this->email->subject('Verifikasi Ditolak | PLN');
       $emaildata['namagerai'] =$rowgerai['nama_gerai'];
       $emaildata['namapenaggungjawab'] =$rowgerai['nama_penanggungjawab'];
       $emaildata['noktp'] =$rowgerai['noktp_penanggungjawab'];
       $emaildata['alamat'] =$rowgerai['alamat_gerai'];
       $emaildata['notelp'] =$rowgerai['no_telp'];
       $emaildata['idgerai'] = $rowgerai['id_gerai'];

       // Isi email
      $message = $this->load->view('template/emails/Email_unverifkasigerai',$emaildata,TRUE);
       $this->email->message($message);
       
       $this->M_Crud->hapus_data(['id_gerai' => $id], 't_gerai');

       // Tampilkan pesan sukses atau error
       if ($this->email->send()) {
          return $response = "1";
       }else {
         return  $response = "2";
       }
   }

   public function Verifikasi($id)
   {
    // Update Status verifikasi
    $data = array(
      'status' => "1",

    );

    $this->M_Crud->update_data(['id_gerai' => $id],$data, 't_gerai');
    $rowgerai = $this->M_Gerai->getgeraiwhereid($id)->row_array();
    //  generate 
    $username =  preg_replace('/\s+/', '', $rowgerai['nama_gerai']) ;
    $randompass = strtolower(random_string('alnum', 8));
    $randomnum = random_string('numeric',4);
    $datauser = [
      'username' => "{$username}{$randomnum}",
      'password' =>  md5($randompass),
      'nama' =>  "admin_{$rowgerai['nama_gerai']}",
      'id_level' => '6',
      'id_gerai' => $rowgerai['id_gerai']
    ];
  //  Membuat akun baru
    $this->M_Crud->input($datauser,'users');

    // VERIFICATION EMAIL
      $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_user' => 'khaliskafka17@gmail.com',  // Email gmail
        'smtp_pass'   => 'kafkakhaliskurniawan170506022',  // Password gmail
        'smtp_crypto' => 'ssl',
        'smtp_port'   => 465,
        'crlf'    => "\r\n",
        'newline' => "\r\n"
    ];
    $this->load->library('email', $config);

      // Email dan nama pengirim
      $this->email->from('no-reply@webpln.com', 'PLN INDONESIA');

      // Email penerima
      $this->email->to($rowgerai['email']); // Ganti dengan email tujuan

      // Lampiran email, isi dengan url/path file
      // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

      // Subject email
      $this->email->subject('Gerai Dibuka  | PLN');
      $emaildata['namagerai'] =$rowgerai['nama_gerai'];
      $emaildata['namapenaggungjawab'] =$rowgerai['nama_penanggungjawab'];
      $emaildata['noktp'] =$rowgerai['noktp_penanggungjawab'];
      $emaildata['alamat'] =$rowgerai['alamat_gerai'];
      $emaildata['notelp'] =$rowgerai['no_telp'];
      $emaildata['idgerai'] = $rowgerai['id_gerai'];
      $emaildata['username'] ="{$username}{$randomnum}";
      $emaildata['password'] = $randompass;
      // Isi email
      $message = $this->load->view('template/emails/Email_verifikasigerai',$emaildata,TRUE);
      $this->email->message($message);

      // Tampilkan pesan sukses atau error
      if ($this->email->send()) {
        return $response = "1";
      }else {
        return  $response = "2";
      }
   }

   public function cetakrekon($idgerai)
   {
    $totalpasng = $this->M_Gerai->gettotalpasang($idgerai)->row_array();
    $rekonbulanan = $this->M_Gerai->GeraiAktifbyid($idgerai)->row_array();
    $total  =$this->M_Gerai->rekongeraibulananpelanggan($idgerai)->row_array();
    $identitasgerai = $this->M_Gerai->getrekonpembayaranbulanan($idgerai)->row_array();
    // $hasil = $total['total'] + $totalpasng['totalaktivitas'];
    // var_dump($total);
    // var_dump($hasil);
    // exit;
    
    $pdf = new FPDF('l','mm','A4');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    // mencetak string 
    
    $pdf->Cell(280,7,'Rekonsiliasi Gerai',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(280,7,'Gerai'.$identitasgerai['nama_gerai'],0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    // IDentitas Gerai
    $pdf->Cell(280,7,'',0,1);
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(35,6,'Nama Gerai',0,0);
    $pdf->Cell(85,6,$identitasgerai['nama_gerai'],0,0);
    $pdf->Cell(85,6,'',0,1);
    $pdf->Cell(35,6,'Alamat Gerai ',0,0);
    $pdf->Cell(28,6,$identitasgerai['alamat_gerai'],0,1);
    $pdf->Cell(85,6,'',0,1);
    // Trnsaksi Gerai
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(280,6,'Pembayaran Bulanan',1,1,'C');
    $pdf->Cell(98,6,'Nomor Kwh',1,0,'C'); 
    $pdf->Cell(60,6,'Tanggal bayar',1,0,'C');
    $pdf->Cell(122,6,'Total Bayar',1,1,'C');


    $pdf->SetFont('Arial','',12);
    $detailbulanan = $this->M_Gerai->rekongeraibulananpelanggan($idgerai)->result();
    foreach($detailbulanan as $row){
      $pdf->Cell(98,6,$row->nomor_kwh,1,0,'C'); 
      $pdf->Cell(60,6,$row->tanggal_pembayaran,1,0,'C');
      $pdf->Cell(122,6,'Rp. '. number_format($row->totalbulanan),1,1,'C');
    }
    $pdf->Cell(280,6,'Transaksi',1,1,'C');
    $pdf->Cell(71,6,'Aktivitas Pembayaran Bulanan',1,0);
    $pdf->Cell(24,6,$rekonbulanan['aktifitasbulanan'],1,0);
    $pdf->Cell(54,6,'Total Rupiah',1,0);
    $pdf->Cell(41,6,'Rp. '.number_format($total['totalbulanan'],2,',','.'),1,1);

    $pdf->Cell(71,6,'Aktivitas Pembayaran Sambungbaru',1,0);
    $pdf->Cell(24,6,$totalpasng['totalaktivitas'],1,0);
    $pdf->Cell(54,6,'Total Rupiah',1,0);
    $pdf->Cell(41,6,'Rp. '.number_format($totalpasng['Total'],2,',','.'),1,1);
    $pdf->Cell(149,6,'Total',1,0,'C');
    $pdf->Cell(41,6,"Rp. ". number_format((intval($total['totalbulanan'] + $totalpasng['Total'])),2,',','.'),1,1,'C');
    // $rekonbulanan = $this->M_Gerai->getrekonpembayaranbulanan($idgerai)->result();
    // foreach ($rekonbulanan as $row){
    //     $pdf->Cell(20,6,$row->nim,1,0);
    //     $pdf->Cell(85,6,$row->nama_lengkap,1,0);
    //     $pdf->Cell(27,6,$row->no_hp,1,0);
    //     $pdf->Cell(25,6,$row->tanggal_lahir,1,1); 
    // }
    $pdf->Output('D','Rekon ' .$identitasgerai['nama_gerai'].'.pdf');
   
   }
     // return json
   public function getverifkasi()
   {
    $data = $this->M_Gerai->getneedverifikasi()->result();
    echo json_encode($data);
   }

   public function getdetailmodal($id)
   {
      $data = $this->M_Gerai->getgeraiwhereid($id)->result();
      foreach ($data as $d ) {
         $button = ($d->status == "1") ? '<button class="btn btn-primary" disabled id="btn-validasibayar" onclick="verifikasi()"> Verifikasi Data</button>' : '22';
         $status = ($d->status == "1") ? "<div class='badge badge-success'>TERVERIFIKASI</div>" : "<div class='badge badge-warning'>BELUM TERVERIFIKASI</div>";
         echo $row = "<div class='row'> 
         <div class='col-xl-12'>
           <div class='widget-heading'>Data Gerai</div>
           <input type='hidden' id='idsambungan' value='{$d->id_gerai}'>
           <table class='table'>
             <tr>
               <td class='pr-4 pl-4'>Nama Penanggung jawab</td>
               <td>{$d->nama_penanggungjawab}</td>
               <td class='pr-4 pl-4'>NIK Penanggung Jawab</td>
               <td>{$d->noktp_penanggungjawab}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Nama Gerai</td>
               <td colspan='3'>{$d->nama_gerai}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Alamat</td>
               <td>{$d->alamat_gerai}</td>
               <td class='pr-4 pl-4'>Telp</td>
               <td>{$d->no_telp} </td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Email</td>
               <td>{$d->email}</td>
               <td class='pr-4 pl-4'>Status</td>
               <td>".$status." </td>
             </tr>
           </table>
         </div>
       </div>";
      }
      
   }

   public function getdetailgerai($id)
   {
      $data = $this->M_Gerai->getdetailgerai($id)->row_array();
         $status = ($data['status']== "1") ? "<div class='badge badge-success'>TERVERIFIKASI</div>" : "<div class='badge badge-warning'>BELUM TERVERIFIKASI</div>";
         echo $row = "<div class='row'> 
         <div class='col-xl-12'>
           <div class='widget-heading'>Data Gerai</div>
           <input type='hidden' id='idgerai' value='{$data['id_gerai']}'>
           <table class='table'>
             <tr>
               <td class='pr-4 pl-4'>Nama Penanggung jawab</td>
               <td>{$data['nama_penanggungjawab']}</td>
               <td class='pr-4 pl-4'>NIK Penanggung Jawab</td>
               <td>{$data['noktp_penanggungjawab']}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Nama Gerai</td>
               <td colspan='3'>{$data['nama_gerai']}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Alamat</td>
               <td>{$data['alamat_gerai']}</td>
               <td class='pr-4 pl-4'>Telp</td>
               <td>{$data['no_telp']} </td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Email</td>
               <td>{$data['email']}</td>
               <td class='pr-4 pl-4'>Status</td>
               <td>".$status." </td>
             </tr>
           </table>
         </div>
       </div>
       <div class='row'>
        <div class='col-xl-12'>
          <div class='widget-heading'>Data Akun</div>
          <div class='table-responsive'>
            <table class='table overflow-auto'>
            <tr>
              <th>ID Petugas</th>
              <th>Nama Petugas</th>
            </tr>
            <tr>
              <td>{$data['id_admin']}</td>
              <td>{$data['nama']}</th>
            </tr>
            </table>
          </div>
        </div>
       </div>
       ";
   }
   
}
