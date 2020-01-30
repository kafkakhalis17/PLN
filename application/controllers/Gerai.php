<?php

class Gerai extends CI_Controller 
{
   public function __construct() {
      parent::__construct();
      $this->load->model('M_Crud');	
      $this->load->model('M_Gerai');	
      $this->load->helper('url');
      $this->load->helper('string');
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
               <td>{$d->nama_gerai}</td>
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
}
