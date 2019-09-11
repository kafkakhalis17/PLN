<?php $this->load->view('template/header');?>

   <div class="page" id="Penggunaan">
      <span class="page-title">Penggunaan</span>
      <div class="tableData">
			<table class="DataTable">
					<thead>
						<tr>
							<td>ID Penggunaan</td>
							<td>ID Pelanggan</td>
							<td>Bulan</td>
							<td>Tahun</td>
							<td>Meter Awal</td>
							<td>Meter Akhir</td>
							<td>Action</td>
						</tr>
					</thead>

					<tbody>
						<?php 
							foreach($penggunaan as $p){ 
						?>
						<tr>
							<td><?php echo $p->id_penggunaan ?></td>
							<td><?php echo $p->id_pelanggan?></td>
							<td><?php echo $p->bulan?></td>
							<td><?php echo $p->tahun ?></td>
							<td><?php echo $p->meter_awal ?></td>
							<td><?php echo $p->meter_akhir ?></td>
							<td><button data-toggle="modal" data-target="#UpMember<?= $p->id_penggunaan?>" class="btn btn-warning">Update</button>
							<button class="btn-danger btn" onclick="Delete('penggunaan','<?= $p->id_penggunaan?>')" >Delete</button></td>
						</tr>
							<?php }?>
					</tbody>
			</table>
		</div>
   </div>
<?php $this->load->view('template/footer');?>