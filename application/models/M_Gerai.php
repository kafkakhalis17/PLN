<?php 
class M_Gerai extends CI_Model
{
   // get
   public function getGerai()
   {
      $this->db->where_not_in('status', '400');
      return $this->db->get('t_gerai');
   }
   public function getneedverifikasi(Type $var = null)
   {
      return $this->db->get_where('t_gerai', ['status' => '0']);
   }
   public function getgeraibyid($idgerai)
   {
      
   }
   public function getgeraiwhereid($id)
   {
      return $this->db->get_where('t_gerai', ['id_gerai' => $id]);
   }  
   public function getdetailgerai($idgerai)
   {
      $this->db->select('*');
      $this->db->from('t_gerai tg');
      $this->db->join('users us', 'us.id_gerai=tg.id_gerai');
      // $this->db->join('t_gerai tg', 'tg.id_gerai=us.id_gerai');
      $this->db->where('tg.id_gerai', $idgerai);
      return $this->db->get();
   }

  public function getrekonpembayaranbulanan($idgerai)
  {
      $this->db->select('*, MONTH(p.tanggal_pembayaran) AS bulanbayar');
      $this->db->from('pembayaran p');
      $this->db->join('users us', 'p.id_admin=us.id_admin'); 
      $this->db->join('t_gerai tg', 'tg.id_gerai=us.id_gerai');
      // $this->db->where('MONTH(p.tanggal_pembayaran)', date('n'));
      $this->db->where('tg.id_gerai', $idgerai);
      return $this->db->get();
  }



  public function GeraiAktif()
  {
   $this->db->select('*, COUNT(p.id_pembayaran) AS aktifitasbulanan, COUNT(tp.id_transaksipasang) AS aktifitassambungan');
   $this->db->from('t_gerai tg');
   $this->db->join('users us', 'tg.id_gerai=us.id_gerai'); 
   $this->db->join('pembayaran p', 'p.id_admin=us.id_admin','left');
   $this->db->join('t_transaksipemohon tp', 'tp.id_admin=us.id_admin','left');
   $this->db->where('MONTH(p.tanggal_pembayaran)', date('n'));
   $this->db->where('YEAR(p.tanggal_pembayaran)', date('Y'));
   $this->db->or_where('MONTH(tp.tanggal_bayar)', date('n'));
   $this->db->where('YEAR(tp.tanggal_bayar)', date('Y'));
   $this->db->group_by('tg.id_gerai');
   return $this->db->get();
  }

  public function GetGerairekon()
  {
   $this->db->select('*, COUNT(p.id_pembayaran) AS aktifitasbulanan, COUNT(tp.id_transaksipasang) AS aktifitassambungan');
   $this->db->from('t_gerai tg');
   $this->db->join('users us', 'tg.id_gerai=us.id_gerai'); 
   $this->db->join('pembayaran p', 'p.id_admin=us.id_admin','left');
   $this->db->join('t_transaksipemohon tp', 'tp.id_admin=us.id_admin','left');
   $this->db->where('MONTH(p.tanggal_pembayaran)', date('n'));
   $this->db->where('YEAR(p.tanggal_pembayaran)', date('Y'));
   $this->db->group_by('tg.id_gerai');
   return $this->db->get();
  }

  public function GeraiAktifbyid($id)
  {
   $this->db->select('*, COUNT(p.id_pembayaran) AS aktifitasbulanan, COUNT(tp.id_transaksipasang) AS aktifitassambungan');
   $this->db->from('t_gerai tg');
   $this->db->join('users us', 'tg.id_gerai=us.id_gerai'); 
   $this->db->join('pembayaran p', 'p.id_admin=us.id_admin','left');
   $this->db->join('t_transaksipemohon tp', 'tp.id_admin=us.id_admin','left');
   $this->db->where('MONTH(p.tanggal_pembayaran)', date('n'));
   $this->db->where('YEAR(p.tanggal_pembayaran)', date('Y'));
   $this->db->where('tg.id_gerai', $id);
   $this->db->group_by('tg.id_gerai');
   return $this->db->get();
  }


  public function gettotalgerai($id)
  {
   $this->db->select('tg.id_gerai, COUNT(p.id_pembayaran) AS aktifitasbulanan, (SUM(jumlah_meter * tarifperkwh)) AS total');
   $this->db->from('t_gerai tg');
   $this->db->join('users us', 'tg.id_gerai=us.id_gerai'); 
   $this->db->join('pembayaran p', 'p.id_admin=us.id_admin','left');
   $this->db->join('tagihan tgn', 'tgn.id_tagihan=p.id_tagihan');
   $this->db->join('pelanggan pg', 'pg.id_pelanggan=p.id_pelanggan');
   $this->db->join('tarif tf', 'tf.id_tarif=pg.id_tarif');
   $this->db->where('MONTH(p.tanggal_pembayaran)', date('n'));
   $this->db->where('YEAR(p.tanggal_pembayaran)', date('Y'));
   $this->db->where('tg.id_gerai', $id);
   $this->db->group_by('tg.id_gerai');
   return $this->db->get();
  }

  public function gettotalpasang($id)
  {
   $this->db->select('(SUM((tj.harga_jaminan * t.daya) +  t.harga_pasang )) AS Total, COUNT(tsp.id_transaksipasang) AS totalaktivitas');
   $this->db->from('t_transaksipemohon tsp');
   $this->db->join('t_pmh_plgn tp', 'tp.id_pmh_plgn = tsp.id_pmh_plgn');
   $this->db->join('t_pmh_sambungan ts', 'ts.id_pmh_sambungan = tp.id_pmh_sambungan ');
   $this->db->join('tarif t','t.id_tarif = tp.id_tarif');
   $this->db->join('t_harga_jaminan tj', 'tj.id_harga_jaminan = t.id_harga_jaminan');  
   $this->db->join('t_peruntukan tpr' , 'tpr.id_peruntukan = tp.id_peruntukan');
   $this->db->join('users us', '.us.id_admin=tsp.id_admin'); 
   $this->db->join('t_gerai tg', 'tg.id_gerai=us.id_gerai'); 
   $this->db->where('tg.id_gerai',$id);
   return $this->db->get();   
   
  }


  public function pembayaranbulananbygerai($idgerai)
  {
     $this->db->select('*,COUNT(p.id_pembayaran) AS aktifitasbulanan');
     $this->db->from('t_gerai tg');
     $this->db->join('users us', 'us.id_gerai=tg.id_gerai');
     $this->db->join('pembayaran p', 'us.id_admin=p.id_admin','inner');
     $this->db->join('pelanggan pg', 'pg.id_pelanggan=p.id_pelanggan', 'inner');
     $this->db->where('tg.id_gerai',$idgerai);
     $this->db->where('MONTH(p.tanggal_pembayaran)', date('n'));
     $this->db->where('YEAR(p.tanggal_pembayaran)', date('Y')); 
     return $this->db->get();
  }
  public function pembayaranpasangbygerai($idgerai)
  {
   $this->db->select('*,COUNT(tp.id_transaksipasang) AS aktifitaspasang');
   $this->db->from('t_gerai tg');
   $this->db->join('users us', 'us.id_gerai=tg.id_gerai');
   $this->db->join('t_transaksipemohon tp', 'us.id_admin=tp.id_admin','inner');
   $this->db->where('tg.id_gerai',$idgerai);
   $this->db->where('MONTH(tp.tanggal_bayar)', date('n'));
   $this->db->where('YEAR(tp.tanggal_bayar)', date('Y')); 
   return $this->db->get();
  }


  public function rekongeraibulananpelanggan($idgerai)
  {
   $this->db->select('*,IF(tn.status_denda ="1", SUM(tn.jumlah_meter * tf.tarifperkwh + tf.tarif_denda), SUM(tn.jumlah_meter * tf.tarifperkwh)) AS totalbulanan');
     $this->db->from('t_gerai tg');
     $this->db->join('users us', 'us.id_gerai=tg.id_gerai');
     $this->db->join('pembayaran p', 'us.id_admin=p.id_admin','inner');
     $this->db->join('tagihan tn','tn.id_tagihan=p.id_tagihan','inner');
     $this->db->join('pelanggan pg', 'pg.id_pelanggan=p.id_pelanggan', 'inner');
     $this->db->join('tarif tf', 'tf.id_tarif=pg.id_tarif','inner');
     $this->db->where('tg.id_gerai',$idgerai);
     $this->db->where('MONTH(p.tanggal_pembayaran)', date('n'));
     $this->db->where('YEAR(p.tanggal_pembayaran)', date('Y')); 
     $this->db->group_by('pg.id_pelanggan');
     return $this->db->get();
  }
}
