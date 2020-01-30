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
							<th>ID Admin</th>
							<th>UserName</th>
							<th>Password</th>
							<th>Nama</th>
							<th>Hak Akses</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody id="tablePelanggan">
						<?php 
							$no = 1;
							foreach($Admin as $ad){ 
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><b><?php echo $ad->ID_admin?></b></td>
							<td><?php echo $ad->Username?></td>
							<td><?php echo $ad->Password ?></td>
							<td><?php echo $ad->Golongan?>-<?php echo $ad->daya?></td>
							<td><button data-toggle="modal" data-target="#UpMember<?= $ad->id_pelanggan?>" class="btn btn-warning"><i class="fas fa-pen-alt"></i></button>
							<button class="btn-danger btn" onclick="Delete('Pelanggan','<?= $ad->id_pelanggan?>')" ><i class="fas fa-trash"></i></button></td>
						</tr>
							<?php }?>
					</tbody>

			</table>
		</div>
	</div>
<?php $this->load->view('template/footer');?>
