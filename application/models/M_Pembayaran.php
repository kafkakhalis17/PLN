<?php 
class M_Pembayaran extends CI_Model
{
    public function GetByKWh($kwh)
    {
      $this->db->select("tg.id_tagihan,p.nomor_kwh,p.nama_pelanggan, p.alamat, tg.bulan, tg.tahun, tg.jumlah_meter, t.daya, t.tarifperkwh, tg.status AS status, t.tarif_denda, (jumlah_meter * tarifperkwh) AS bayar");
      $this->db->from("tagihan tg");
      // $this->db-join("penggunaan pg", "pg.id_pelanggan=p.id_pelanggan");
      $this->db->join("pelanggan p", "tg.id_pelanggan = p.id_pelanggan", "inner");
      $this->db->join("tarif t", "t.id_tarif=p.id_tarif", "inner");
      $this->db->where("p.nomor_kwh", $kwh);
      // $this->db->group_by("p.nomor_kwh");
      // $this->db->group_by("tg.tahun");
      $this->db->where("tg.status", "belum bayar");
      $this->db->or_where("tg.status", "nunggak");
      return $this->db->get();
      // Digunakan untuk mencari pembayaran 
      // Dikalikan dengan tarif
      // return $this->db->query("SELECT * , (jumlah_meter * tarifperkwh) AS bayar FROM v_tagihan Where nomor_kwh={$kwh} AND status='belum bayar' OR status='nunggak'");
    }   
    public function GetByID($id)
    {
      $this->db->like('Status','Belum Bayar');
      return $this->db->query("SELECT * FROM v_tagihan Where id_tagihan={$id}");
    }   

    // Where Code 
    public function getbayarpasangabaru($code)
    {
      $this->db->select('tk.kode_unik, tp.id_pmh_plgn, tp.nama, ts.nama_pmh, (tj.harga_jaminan * t.daya) AS jaminan, t.harga_pasang');
      $this->db->from('t_kodepembayarandaftar tk');
      $this->db->join('t_pmh_plgn tp', 'tp.id_pmh_plgn = tk.id_pmh_plgn ');
      $this->db->join('t_pmh_sambungan ts', 'ts.id_pmh_sambungan = tp.id_pmh_sambungan ');
      $this->db->join('tarif t','t.id_tarif = tp.id_tarif');
      $this->db->join('t_harga_jaminan tj', 'tj.id_harga_jaminan = t.id_harga_jaminan');  
      $this->db->join('t_peruntukan tpr' , 'tpr.id_peruntukan = tp.id_peruntukan');
      $this->db->where('tk.kode_unik',$code);
      return $this->db->get();
    }
    public function getbayarpasangabaruwhereid($id)
    {
      $this->db->select('tk.kode_unik, tp.id_pmh_plgn, tp.nama, ts.nama_pmh, (tj.harga_jaminan * t.daya) AS jaminan, t.harga_pasang');
      $this->db->from('t_kodepembayarandaftar tk');
      $this->db->join('t_pmh_plgn tp', 'tp.id_pmh_plgn = tk.id_pmh_plgn ');
      $this->db->join('t_pmh_sambungan ts', 'ts.id_pmh_sambungan = tp.id_pmh_sambungan ');
      $this->db->join('tarif t','t.id_tarif = tp.id_tarif');
      $this->db->join('t_harga_jaminan tj', 'tj.id_harga_jaminan = t.id_harga_jaminan');  
      $this->db->join('t_peruntukan tpr' , 'tpr.id_peruntukan = tp.id_peruntukan');
      $this->db->where('tp.id_pmh_plgn',$id);
      return $this->db->get();
    }

    public function currentbayar()
    {
      $this->db->select('*');
      $this->db->from('pembayaran p');
      $this->db->join('tagihan t', 't.id_tagihan=p.id_tagihan');
      $this->db->join('pelanggan pg', 'pg.id_pelanggan=p.id_pelanggan');
      $this->db->join('users us', 'us.id_admin=p.id_admin');
      $this->db->join('t_gerai tg', 'tg.id_gerai=us.id_gerai');
      $this->db->where('p.tanggal_pembayaran', date('Y-m-d'));
      $this->db->order_by('p.id_pembayaran','DESC');
      $this->db->limit(10);
      return $this->db->get();
    }

    public function historibulanangerai($idadmin)
    {
      $this->db->select("*, MONTH(p.tanggal_pembayaran) AS bulanbayar, (jumlah_meter * tarifperkwh) AS total  ");
      $this->db->from('pembayaran p');
      $this->db->join('tagihan t', 't.id_tagihan=p.id_tagihan');
      $this->db->join('pelanggan pg', 'pg.id_pelanggan=p.id_pelanggan');
      $this->db->join('users us', 'us.id_admin=p.id_admin');
      $this->db->join('t_gerai tg', 'tg.id_gerai=us.id_gerai');
      $this->db->join('tarif','tarif.id_tarif = pg.id_tarif');
      $this->db->where('MONTH(p.tanggal_pembayaran)', date('n'));
      $this->db->where('p.id_admin',$idadmin);
      $this->db->order_by('p.id_pembayaran','DESC');
      return $this->db->get();
    }
}
