
<?php 
    class Tagihan extends CI_Controller
    {
        public function __construct() {
            parent::__construct();
            $this->load->model('M_Crud');	
            $this->load->model('M_Tagihan');
            $this->load->model('M_Tarif');
            $this->load->model('M_Crud');
            $this->load->model('M_Pelanggan');
            $this->load->model('M_Sambungan');
            $this->load->helper('url');
            // Jika ada data yang belum bayar sebelum bulan yang sekarang
            $data = $this->M_Tagihan->checktagihan()->result(); 
            foreach ($data as $d) {	
                // Jika Tagihan lebih dari 2 kali
                $numrow = $this->M_Tagihan->checktagihanpelanggan($d->id_pelanggan)->num_rows();
                $pelangganrow = $this->M_Pelanggan->getpelangganwhereid($d->id_pelanggan)->row_array();
                if ($numrow > 2) {
                    if (strtotime($d->bulan.'/'.$d->tahun) < strtotime("now")) {
                        $tagihan = [
                            'status' => 'nunggak',
                            'status_denda' => '1'
                        ];
                        $putussementara = [
                            'status' => '399'
                        ];
                        $this->M_Sambungan->updateStatus($pelangganrow['nomor_kwh'],$putussementara);
                    //   Update data Tagihan
                      $this->M_Tagihan->autodetect($tagihan,$d->id_pelanggan);  
                    }
                }
            }
        }
        public function index()
        {
            if($this->session->userdata('id_level') == '3' || $this->session->userdata('id_level') == '6' ){
                redirect("Admin");
            }else{
             
                $data['tagihan'] = $this->M_Tagihan->GetvTagihan()->result();
                return $this->load->view('v_tagihan',$data);
            }
            
        }
        public function input()
        {
            $IDPelanggan = $this->input->post('id_pelanggan');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $m_awal = $this->input->post('meter_awal');
            $m_akhir = $this->input->post('meter_akhir');
            $idPenggunaan = $this->input->post('id_penggunaan');
            // $idTarif = $this->db->query("SELECT id_tarif FROM pelanggan WHERE id_pelanggan={$IDPelanggan}");
            // $tarif = $this->M_Tarif->TarifById($idTarif)->result();
            $m_total = $m_akhir-$m_awal;                   

            $data = array(
                'id_penggunaan' => $idPenggunaan,
                'id_pelanggan' => $IDPelanggan,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'jumlah_meter' =>$m_total,
                'status'=> "Belum Bayar"
             );
            // $banyak = $this->M_Tagihan->checktagihan($Ta)->num_rows();
            // Jika ada 3 Tagihan maka Pelanggan Akan Terkena Denda dan 
            // if ($banyak >= 3) {
            //     $data = array(
            //         'id_penggunaan' => $idPenggunaan,
            //         'id_pelanggan' => $IDPelanggan,
            //         'bulan' => $bulan,
            //         'tahun' => $tahun,
            //         'jumlah_meter' =>$m_total,
            //         'status'=> "Belum Bayar"
            //      );
            //     $statusplgn = [
            //         'status' => "0"
            //     ];
            //     $this->M_Crud->update->update_data(['id_pelanggan' => $IDPelanggan]);
            // }else{
            //     $this->M_Crud->input($data,'tagihan');
            // }   
            $this->M_Crud->input($data,'tagihan');
        }
        public function Delete($id)
        {
            $where = array('id_tagihan' => $id);
            $this->M_Crud->hapus_data($where,'tagihan');
            redirect('Tagihan/index');
        } 
        public function GetJsonTagihan()
        {
           $data = $this->M_Tagihan->GetvTagihan()->result();
           echo json_encode($data);
        }
        public function GetJsonTagihanByID($id)
        {
           $data = $this->M_Tagihan->GetAlldataWhereID($id)->result();
           echo json_encode($data);
        }

        public function GetJsonTagihanByKwh($kwh)
        {
            $data = $this->M_Tagihan->GetAlldataWhereKWH($kwh)->result();
            echo json_encode($data);
        }

        public function GetJsonTagihanByIdPenggunaan($id)
        {
            $data = $this->M_Tagihan->GetAlldataWherePenggunaan($id)->result();
            echo json_encode($data);
        }
        
    }
    
