<?php $this->load->view('template/header');?>

	<div class="page" id="MasterMember">
		<span class="page-title">Data Pelanggan</span>
		<div class="button-container">
		<button data-toggle="modal" data-target="#inputMember" class="btn btn-primary"><i class="fas fa-save"></i> Input</button>
		</div>
		<div class="tableData">
			<table class="DataTable table table-striped">
					<thead>
						<tr>
							<th>NO</th>
							<th>No KWh</th>
							<th>Nama Pelanggan</th>
							<th>Alamat</th>
							<th>Gol Daya</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody id="tablePelanggan">
						<?php 
							$no = 1;
							foreach($pelanggan as $p){ 
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><b><?php echo $p->nomor_kwh?></b></td>
							<td><?php echo $p->nama_pelanggan?></td>
							<td><?php echo $p->alamat ?></td>
							<td><?php echo $p->Golongan?>-<?php echo $p->daya?></td>
							<td><button data-toggle="modal" data-target="#UpMember<?= $p->id_pelanggan?>" class="mb-2 mr-2 btn btn-warning"><i class="fas fa-pen-alt"></i></button>
							<button class="mb-2 mr-2 btn-danger btn" onclick="Delete('Pelanggan','<?= $p->id_pelanggan?>')" ><i class="fas fa-trash"></i></button></td>
						</tr>
							<?php }?>
					</tbody>

			</table>
		</div>
	</div>
<?php $this->load->view('template/footer');?>
<?php $this->load->view('template/modal/modal-inputPelanggan');?>
<?php $this->load->view('template/modal/modal-upPelanggan');?>