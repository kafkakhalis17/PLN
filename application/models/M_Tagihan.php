 <?php 
class M_Tagihan extends CI_Model
{
    public function GetTagihan()
    {
        return $this->db->get('tagihan');
    }
    public function GetvTagihan()
    {
        $this->db->select('*, tagihan.status as statustagihan');
        $this->db->from('tagihan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
        return $this->db->get();
    }
    public function GetTagihanById_M($idtagihan)
    { 
        return $this->db->query("SELECT * FROM v_tagihan WHERE id_tagihan={$idtagihan}");
    }

    public function GetAlldataWhereID($id)
    {
        $this->db->select('*');
        $this->db->from('tagihan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
        $this->db->where('id_tagihan',$id);
        return $this->db->get();
    }

    public function GetAlldataWhereKWH($no_kwh)
    {
        $this->db->select('*, tagihan.status AS status, pelanggan.status AS statuspelanggan');
        $this->db->from('tagihan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
        $this->db->where('nomor_kwh',$no_kwh);
        return $this->db->get();
    }
    
    public function GetAlldataWherePenggunaan($id)
    {
        $this->db->select('*');
        $this->db->from('tagihan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        $this->db->join('penggunaan', 'penggunaan.id_penggunaan = tagihan.id_penggunaan');
        $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
        $this->db->where('penggunaan.id_penggunaan',$id);
        return $this->db->get();
    }
    public function checktagihan()
    {
        $this->db->select('*');
        $this->db->from('tagihan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        // $this->db->where('pelanggan.id_pelanggan',$idpelanggan);
        return $this->db->get();
    }
    // Auto check Tagihan di controller Tagihan
    public function checktagihanpelanggan($idpelanggan)
    {
        $this->db->select('*');
        $this->db->from('tagihan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        $this->db->where('pelanggan.id_pelanggan',$idpelanggan);
        $this->db->where('tagihan.status','Belum Bayar');
        $this->db->or_where('tagihan.status', 'nunggak');
        return $this->db->get();
    }

    public function inputTagihan($data)
    {
        $this->db->insert('Tagihan',$data);
    }

    public function autodetect($tagihan,$id)
    {
        $array = array('id_pelanggan' => $id, 'status' => "Belum Bayar");
        $this->db->where($array); 
        $this->db->update('tagihan',$tagihan); 
    }
    
}
