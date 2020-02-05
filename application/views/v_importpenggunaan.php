<?php $this->load->view('template/header')?>

<div class="app-page-title">
   <div class="page-title-wrapper">
      <div class="page-title-heading">
         <div class="page-title-icon">
            <i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
            </i>
         </div>
         <div>Laporan Penggunaan Listrik Bulan ini
            <div class="page-title-subheading">
               Penghitung Total pembayaran listrik 
            </div>
         </div>
      </div>
   </div>
</div>

<div class="card">
   <div class="card-body">
   <table class="table table-stripted">
      <thead>
         <tr>
            <th>No KWH</th>
            <th>Alamat</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Meter Akhir</th>
         </tr>
      </thead>
      <tbody>
         <?php 
         $numrow = 1;
         foreach ($sheet as $row) {
            $nokwh = $row['A'];
            $alamat = $row['B'];
            $bulan = $row['C'];
            $tahun = $row['D'];
            $meter_akhir = $row['E'];

            if($numrow > 1)
            {
            ?>
            <tr>
               <td><?= $nokwh?></td>
               <td><?= $alamat?></td>
               <td><?= $bulan?></td>
               <td><?= $tahun?></td>
               <td><?= $meter_akhir?></td>
            </tr>
         <?php }
            $numrow++;
         }
         ?>
      </tbody>
   </table>
   </div>
   <div class="card-footer">
      <form action="<?= base_url('Penggunaan/import')?>" method="POST">
         <input type="submit" value="IMPORT DATA" class="btn btn-primary">
      </form>
   </div>
</div>
<?php $this->load->view('template/footer')?>;