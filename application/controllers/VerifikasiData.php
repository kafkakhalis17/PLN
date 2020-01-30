<?php

class VerifikasiData extends CI_Controller 
{
   public function __construct() {
      parent::__construct();
      $this->load->model('M_Pembayaran');
      $this->load->model('M_Pelanggan');
      $this->load->model('M_Crud');	
      $this->load->model('M_Sambungan');
      $this->load->model('M_Tarif');
      $this->load->model('M_verifikasi');
      $this->load->helper('url');
      $this->load->helper('string');
   }
   function verifikasipasangbaru(){
    if ($this->session->userdata('id_level') == '2' ||  $this->session->userdata('id_level') == '5' ) {
       $this->load->view('v_verifikasipasangbaru');
     }
     else {
       redirect(base_url('Dashboard'));
     }
   }
   
   public function verifikasipemasangan($id)
   {
    $where = array(
      'id_pmh_plgn' => $id
    );
    // Get Data Pelanggan 
    $rowpelanggan = $this->M_verifikasi->getpemohonpelanggan($where)->row_array();
    $datapembayaran = $this->M_Pembayaran->getbayarpasangabaruwhereid($rowpelanggan['id_pmh_plgn'])->row_array();
    // Get Pemohon Sambungan
    $wherepemohon = array(
      'id_pmh_sambungan' => $rowpelanggan['id_pmh_sambungan']
    );
    $row = $this->M_verifikasi->getwhereterverifikasi($wherepemohon)->row_array();

      // Jika Status belum terverifikasi
     if ($rowpelanggan['status'] == "0") {
      // Update Status verifikasi
      $data = array(
        'status' => "1",
        'tanggal_validate' => Date('Y-m-d')
      );
      $this->M_verifikasi->verifikasisambungan($where,$data);
      
      

      // Membuat Random String untuk kode pembayaran
      $randomstr = strtoupper ( random_string('alnum', 6) );
      $randomcodedata = array(
        'kode_unik' => $randomstr,
        'id_pmh_plgn' =>  $rowpelanggan['id_pmh_plgn']
      );
      // 
     
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
        $this->email->to($row['email']); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('KODE PEMBAYARAN | PLN');
        $emaildata['namapelanggan'] =$rowpelanggan['nama'];
        $emaildata['namapemohon'] =$row['nama_pmh'];
        $emaildata['idpelanggan'] =$rowpelanggan['id_pmh_plgn'];
        $emaildata['alamat'] =$rowpelanggan['alamat'];
        $emaildata['provinsi'] =$rowpelanggan['provinsi'];
        $emaildata['kota'] = $rowpelanggan['nama_kota'];
        $emaildata['kecamatan'] = $rowpelanggan['nama_kecamatan'];
        $emaildata['kelurahan'] = $rowpelanggan['nama_kelurahan'];
        $emaildata['peruntukan'] =$rowpelanggan['peruntukan'];
        $emaildata['keperluan'] =$rowpelanggan['keperluan'];
        $emaildata['kodeunik'] =$randomstr;
        $emaildata['hargapasang'] = number_format($datapembayaran['harga_pasang'],2,',','.');
        $emaildata['hargatotal'] = number_format($datapembayaran['harga_pasang']+$datapembayaran['jaminan'],2,',','.');
        $emaildata['hargajaminan'] = number_format($datapembayaran['jaminan'],2,',','.');
 
        // Isi email
        $message = $this->load->view('template/emails/Email_kodepembayaran',$emaildata,TRUE);
        $this->email->message($message);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
           // Input kode pembayaran
          $this->M_Crud->input($randomcodedata,'t_kodepembayarandaftar');
        }else {
          echo 'Error! email tidak dapat dikirim.';
        }
        // If Status Menunggu Pembayaran
      }elseif ($rowpelanggan['status'] == "1") {
       return False;
      // iF Status Menunggu Pemasanagan
      }elseif ($rowpelanggan['status'] == "2") {
          $randomnokwh = random_string('numeric', 12);
          $datapelanggan = array(
          'nomor_kwh' => $randomnokwh,
          'nama_pelanggan' => $rowpelanggan['nama'],
          'alamat' => "{$rowpelanggan['alamat']} {$rowpelanggan['nama_kelurahan']} {$rowpelanggan['nama_kecamatan']}, {$rowpelanggan['nama_kelurahan']}, {$rowpelanggan['provinsi']}",
          'npwp' => $rowpelanggan['npwp'],
          'id_peruntukan' => $rowpelanggan['id_peruntukan'],
          'no_telp' => $rowpelanggan['no_telp'],
          'no_telp2' => $rowpelanggan['no_telp2'],
          'no_ktp' => $rowpelanggan['no_ktp'],
          'id_tarif' => $rowpelanggan['id_tarif'],
        );
        $this->M_Crud->input($datapelanggan, 'pelanggan');

        $wherepemohon = array(
          'id_pmh_sambungan' => $rowpelanggan['id_pmh_sambungan']
        );
        
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
          $this->email->to($row['email']); // Ganti dengan email tujuan
  
          // Lampiran email, isi dengan url/path file
          // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
  
          // Subject email
          $this->email->subject('KODE PEMBAYARAN | PLN');
          $emaildata['namapelanggan'] =$rowpelanggan['nama'];
          $emaildata['nokwh'] = $randomnokwh;
          $emaildata['alamat'] =$rowpelanggan['alamat'];
          $emaildata['provinsi'] =$rowpelanggan['provinsi'];
          $emaildata['kota'] = $rowpelanggan['nama_kota'];
          $emaildata['kecamatan'] = $rowpelanggan['nama_kecamatan'];
          $emaildata['kelurahan'] = $rowpelanggan['nama_kelurahan'];
          $emaildata['daya'] = $rowpelanggan['daya'];
            
          // Isi email
          $message = $this->load->view('template/emails/Email_pemasangan',$emaildata,TRUE);
          $this->email->message($message);
  
          // Kirim Email
          $this->email->send();

         
          $this->M_Crud->hapus_data(['id_pmh_plgn' => $rowpelanggan['id_pmh_plgn']], 't_pmh_plgn');
          $this->M_Crud->hapus_data($wherepemohon, 't_pmh_sambungan');
      }
    }

    public function unverifikasi($id)
    {
        $where = array(
          'id_pmh_plgn' => $id
        );
        // Get Data Pelanggan 
        $rowpelanggan = $this->M_verifikasi->getpemohonpelanggan($where)->row_array();
        $datapembayaran = $this->M_Pembayaran->getbayarpasangabaruwhereid($rowpelanggan['id_pmh_plgn'])->row_array();
        // Get Pemohon Sambungan
        $wherepemohon = array(
          'id_pmh_sambungan' => $rowpelanggan['id_pmh_sambungan']
        );
        $row = $this->M_verifikasi->getwhereterverifikasi($wherepemohon)->row_array();

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
        $this->email->to($row['email']); // Ganti dengan email tujuan
 
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
 
        // Subject email
        $this->email->subject('Verifikasi Ditolak | PLN');
        $emaildata['namapelanggan'] =$rowpelanggan['nama'];
        $emaildata['alamat'] =$rowpelanggan['alamat'];
        $emaildata['provinsi'] =$rowpelanggan['provinsi'];
        $emaildata['kota'] = $rowpelanggan['nama_kota'];
        $emaildata['kecamatan'] = $rowpelanggan['nama_kecamatan'];
        $emaildata['kelurahan'] = $rowpelanggan['nama_kelurahan'];
        $emaildata['daya'] = $rowpelanggan['daya'];
 
        // Isi email
        $message = $this->load->view('template/emails/Email_unverifikasipelanggan',$emaildata,TRUE);
        $this->email->message($message);
        
        $this->M_Crud->hapus_data(['id_pmh_plgn' => $id], 't_pmh_plgn');
        $this->M_Crud->hapus_data(['id_pmh_sambungan' => $rowpelanggan['id_pmh_sambungan']], 't_pmh_sambungan');
        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
           return $response = "1";
        }else {
          return  $response = "2";
        }
    }
 

  //  JSON data table ajax
   public function getAllDatapermohonan()
   {
        $data = $this->M_Sambungan->getdatapemohonnonverifikasi()->result();
        echo json_encode($data);
     
   }
   public function getjsondetailpemohon($id)
   {
      $data = $this->M_Sambungan->getdetailpelanggan($id)->result();
      echo json_encode($data);
   }

   public function getdetailmodal($id)
   {
      $data = $this->M_Sambungan->getdetailpelanggan($id)->result();
      foreach ($data as $d ) {
         $button = ($d->status == "1") ? '<button class="btn btn-primary" disabled id="btn-validasibayar" onclick="verifikasi()"> Verifikasi Data</button>' : '22';
         $status = ($d->status == "1") ? "<div class='badge badge-success'>TERVERIFIKASI</div>" : "<div class='badge badge-warning'>BELUM TERVERIFIKASI</div>";
         echo $row = "<div class='row'> 
         <div class='col-xl-12'>
           <div class='widget-heading'>Data Pemohon</div>
           <div class='widget-subheading opacity-7'>ID PMH {$d->id_pmh_sambungan}</div>
           <input type='hidden' id='idsambungan' value='{$d->id_pmh_plgn}'>
           <table class='table'>
             <tr>
               <td class='pr-4 pl-4'>Nama</td>
               <td>{$d->nama_pmh}</td>
               <td class='pr-4 pl-4'>NIK</td>
               <td>{$d->nik_pemohon}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Alamat</td>
               <td>{$d->alamat_pmh}</td>
               <td class='pr-4 pl-4'>Telp</td>
               <td>{$d->telp1_pmh} / {$d->telp2_pmh}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Email</td>
               <td>{$d->email}</td>
               <td class='pr-4 pl-4'>Status</td>
               <td>".$status." </td>
             </tr>
           </table>
         </div>
       </div>
       <div class='row'>
         <div class='col-xl-12'>
         <div class='widget-heading'>Data Pelanggan</div>
         <div class='widget-subheading opacity-7'>ID PMH_PLGN {$d->id_pmh_plgn}</div>
           <table class='table'>
             <tr>
               <td class='pr-4 pl-4'>Nama</td>
               <td>{$d->nama}</td>
               <td>NIK</td>
               <td>{$d->no_ktp}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Alamat</td>
               <td colspan='3'>{$d->alamat_plgn}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Telp</td>
               <td colspan='3'>{$d->no_telp} / {$d->no_telp2}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>NPWP</td>
               <td>{$d->npwp}</td>
               <td class='pr-4 pl-4'>Nama<br>NPWP</td>
               <td>{$d->nama_npwp}</td>
             </tr>
             <tr>
               <td class='pr-4 pl-4'>Alamat NPWP</td>
               <td colspan='3'>{$d->alamat_npwp}, {$d->nama_kelurahan} {$d->nama_kecamatan}<br> {$d->nama_kota}, {$d->provinsi}</td>
             </tr>
           </table>
         </div>
       </div>
       <div class='row'>
         <div class='col-xl-12'>
           <div class='widget-heading'>Data Pemasangan</div> 
           <table class='table'>
             <tr>
               <td>Peruntukan</td>
               <td>{$d->peruntukan}</td>
             </tr>
             <tr>
               <td>Keperluan</td>
               <td>{$d->keperluan}</td>
             </tr>
             <tr>
               <td>Jumlah Pemasangan</td>
               <td>{$d->jumlah_pemasangan}</td>
             </tr>
           </table>
         </div>
       </div>";
      }
   }
}
