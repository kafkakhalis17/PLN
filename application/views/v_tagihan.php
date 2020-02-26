<?php $this->load->view('template/header');?>
<?php $this->load->view('template/modal/modal-inputTagihan');?>
<?php $this->load->view('template/modal/modal-UpTagihan');?>


<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div>Tagihan Dan Status
				<div class="page-title-subheading">
				Pendataan Tagihan
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page" id="tagihan">
	<span class="page-title">Data Tagihan <i class="fas fa-file-invoice-dollar"></i></span>
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
				<table class="DataTable table table-striped">
						<thead>
							<tr>
								<th>ID Tagihan</th>
								<th>ID Penggunaan</th>
								<th>NO KWH</th>
								<th>Bulan</th>
								<th>Tahun</th>
								<th>Jumlah Meter</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody id="tablePelanggan">
							<?php 
							$no = 1;
							foreach($tagihan as $t){ 
						?>
							<tr>
								<td><?php echo $t->id_tagihan ?></td>
								<td><?php echo $t->id_penggunaan?></td>
								<td><?php echo $t->nomor_kwh?></td>
								<td><?php echo $t->bulan ?></td>
								<td><?php echo $t->tahun ?></td>
								<td><?php echo $t->jumlah_meter ?></td>
								<td><?php if ($t->statustagihan == "Belum Bayar" || $t->statustagihan == "nunggak" ) {
									echo "<span class='badge badge-warning'>".$t->statustagihan."</span>";
								}else{
									echo "<span class='badge badge-success'>".$t->statustagihan."</span>";
								} ?></td>
								<td>
								<!-- <button data-toggle="modal" data-target="#UpMember<?= $t->id_tagihan?>"
									class="btn btn-warning"><i class="fas fa-pen-alt"></i></button> -->
									<button class="btn-danger btn" onclick="Delete('Tagihan','<?= $t->id_tagihan?>')"><i
											class="fas fa-trash"></i></button>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('template/footer');?>
