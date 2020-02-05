  <?php $this->load->view('template/header');?>

	<div class="page" id="MasterMember">
		
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div>Pelanggan PLN
					<div class="page-title-subheading">
						Pendataan Pelanggan  
					</div>
				</div>
			</div>
		</div>
	</div>
  	<div class="row">
  		<div class="col-xl-12">
		  <button data-toggle="modal" data-target="#inputMember" class="btn btn-primary float-right"><i class="fas fa-save"></i> Input</button>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-xl-12">
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
</div>

<?php $this->load->view('template/footer');?>
<?php $this->load->view('template/modal/modal-inputPelanggan');?>
<?php $this->load->view('template/modal/modal-upPelanggan');?>