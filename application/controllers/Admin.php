    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Login');
        $this->load->helper('url');		
      
     }

     public function index()
     {
         if($this->session->userdata('status') == "login" && $this->session->userdata('id_level') == '2' || $this->session->userdata('id_level') == '5' || $this->session->userdata('id_level') == '6' ||  $this->session->userdata('id_level') == '3'){
			redirect(base_url("Dashboard"));
		}else {
            return $this->load->view('v_login');
        }
     }

     public function masuk()
     {
         $username = $this->input->post('username');
         $password = $this->input->post('password');

         $pass = md5($password);
        
         $cek = $this->M_Login->cek_login($username,$pass)->num_rows();
 
		 if($cek > 0){
            $userdata=$this->M_Login->GetLogin($username,$pass)->result();
            foreach ($userdata as $r) {
    
                $data_session = array(
                    'id' => $r->id_admin,
                    'nama' => $r->nama,
                    'status' => "login",
                    'hak' => $r->nama_jabatan,
                    'id_level' => $r->id_level
                );
            }
			$this->session->set_userdata($data_session);
            
        redirect(base_url("Admin"));
		}else{
            // echo "Username dan password salah !";
            $this->session->set_tempdata('appin', true , 300);
            $this->session->set_flashdata('Error','<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Wrong Username or Password</strong> You should check in on some of those fields below.<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'); 
            redirect('Admin');
        }
         
     }  
     function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Admin'));
    }
}
