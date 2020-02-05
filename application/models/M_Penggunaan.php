<?php
class M_Penggunaan extends CI_Model{
    
   function GetPenggunaan()
   {
    return $this->db->get('v_penggunaan');
   }

   public function inputPenggunaan($data)
   {
       $this->db->insert('penggunaan',$data);
   }
   public function insert_multiple($data){
    $this->db->insert_batch('penggunaan', $data);
}
   
   public function GetPenggunaanWhereID($where)
   {
       return $this->db->query("SELECT * FROM v_penggunaan WHERE id_penggunaan={$where}");
   }
   public function GetPelangganByPenggunaan()
   {
       return $this->db->query("SELECT p.id_pelanggan, p.nomor_kwh FROM pelanggan p INNER JOIN penggunaan pg ON p.id_pelanggan=pg.id_pelanggan GROUP BY p.id_pelanggan");
   }
   public function GetPenggunaanBaru()
   {
       return $this->db->query("SELECT * FROM penggunaan ORDER BY `penggunaan`.`id_penggunaan` DESC LIMIT 1");
   }
   public function GetPenggunaanBaruByID($where)
   {
       return $this->db->query("SELECT * FROM penggunaan  WHERE id_pelanggan={$where} ORDER BY `penggunaan`.`id_penggunaan` DESC ");
   }
   public function GetDateByID($where)
   {
    $this->db->select("*");
    $this->db->from('penggunaan');
    $this->db->where($where);
    $this->db->order_by('id_penggunaan', 'DESC');
   return $this->db->get();
   }

   public function upload_file($filename){
        $this->load->library('upload'); // Load librari upload
        
        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']	= '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    
}