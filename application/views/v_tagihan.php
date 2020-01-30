<?php $this->load->view('template/header');?>
<?php $this->load->view('template/modal/modal-inputTagihan');?>
<?php $this->load->view('template/modal/modal-UpTagihan');?>

<div class="page" id="tagihan">
	<span class="page-title">Data Tagihan <i class="fas fa-file-invoice-dollar"></i></span>
	<div class="container-fluid">
		<div class="button-container ">
			<button data-toggle="modal" data-target="#inputTagihan" class="btn btn-primary"><i class="fas fa-save"></i>	Input</button>
		</div>
	</div>
	<div class="tableData">
		<div class="row">
			<div class="col-md-9 col-sm-6 col-xl-12">
			
				<div class="table-responsive">
		
					<table class="DataTable table table-striped">
						<thead>
							<tr>
								<th>ID Tagihan</th>
								<th>ID Penggunaan</th>
								<th>ID Pelanggan</th>
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
								<td><?php echo $t->id_pelanggan?></td>
								<td><?php echo $t->bulan ?></td>
								<td><?php echo $t->tahun ?></td>
								<td><?php echo $t->jumlah_meter ?></td>
								<td><?php echo $t->status ?></td>
								<td>
									<button data-toggle="modal" data-target="#UpMember<?= $t->id_tagihan?>"
										class="btn btn-warning"><i class="fas fa-pen-alt"></i></button>
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
