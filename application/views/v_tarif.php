<?php $this->load->view('template/header');?>
<div class="page" id="tarif">
	<span class="page-title">Data Tarif <i class="fas fa-file-invoice-dollar"></i></span>
	<div class="button-container">
		<button data-toggle="modal" data-target="#inputTagihan" class="btn btn-primary"><i class="fas fa-save"></i>
			Input</button>
	</div>
	<div class="tableData">
	<ul class="list-group">
		<?= $this->session->flashdata('Error');?>
	</ul>
		<div class="row">
			<div class="col-xl-12 col-md-7 col-sm-6">
				<div class="table-responsive">
					<table class="DataTable table table-striped">
						<thead>
							<tr>
								<th scope="col">ID Tarif</th>
								<th scope="col">Golongan</th>
								<th scope="col">Daya</th>
								<th scope="col">Tarif/Kwh</th>
								<th scope="col">Action</th>
							</tr>
						</thead>

						<tbody id="tablePelanggan">
							<?php 
							$no = 1;
							foreach($tarif as $t){ 
						?>
							<tr>
								<td scope="row"><?php echo $t->id_tarif ?></td>
								<td><?php echo $t->Golongan?></td>
								<td><?php echo $t->daya?></td>
								<td><?php echo $t->tarifperkwh ?></td>
								<td>
									<button data-toggle="modal" data-target="#UpMember<?= $t->id_tarif?>"
										class="btn btn-warning"><i class="fas fa-pen-alt"></i></button>
									<button class="btn-danger btn" onclick="Delete('Tarif','<?= $t->id_tarif?>')"><i
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
<?php $this->load->view('template/modal/modal-inputtarif');?>