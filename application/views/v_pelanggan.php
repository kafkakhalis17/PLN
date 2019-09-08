<?php $this->load->view('template/header');?>
<?php $this->load->view('template/modal/modal-inputPelanggan');?>
<?php $this->load->view('template/modal/modal-upPelanggan');?>
	<div class="page" id="MasterMember">
		<span class="page-title">Data Pelanggan</span>
		<div class="button-container">
			<button data-toggle="modal" data-target="#inputMember" class="btn btn-input">Input</button>
		</div>
		<div class="tableData">
			<table class="DataTable">
					<thead>
						<tr>
							<td>NO</td>
							<td>No KWh</td>
							<td>Nama Pelanggan</td>
							<td>Alamat</td>
							<td>ID Tarif</td>
							<td>Action</td>
						</tr>
					</thead>

					<tbody id="tablePelanggan">
						<?php 
							$no = 1;
							foreach($pelanggan as $p){ 
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $p->nomor_kwh?></td>
							<td><?php echo $p->nama_pelanggan?></td>
							<td><?php echo $p->alamat ?></td>
							<td><?php echo $p->id_tarif ?></td>
							<td><button data-toggle="modal" data-target="#UpMember<?= $p->id_pelanggan?>" class="btn btn-warning">Update</button>
							<button class="btn-danger btn" onclick="Delete('Pelanggan','<?= $p->id_pelanggan?>')" >Delete</button></td>
						</tr>
							<?php }?>
					</tbody>

			</table>
		</div>
	</div>
<?php $this->load->view('template/footer');?>
