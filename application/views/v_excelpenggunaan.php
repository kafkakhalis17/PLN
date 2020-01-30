<!-- <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
  -->
<style> .kwh{ mso-number-format:\@; } </style>
 <table border="1" width="100%">
   <thead>
      <tr>
         <th>NO KWH</th>
         <th>Alamat</th>
         <th>Bulan</th>
         <th>Tahun</th>
         <th>Meter akhir</th>
      </tr>
   </thead>
      <tbody>
           <?php $i=1; foreach($data as $d) { ?>
           <tr>
                <td class="kwh"><?=$d->nomor_kwh; ?></td>
                <td><?= $d->alamat?></td>
                <td><?php echo date('F') ?></td>
                <td><?php echo date('Y'); ?></td>
                <td></td>
           </tr>
           <?php $i++; } ?>
         </tbody>
 </table>