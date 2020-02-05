<?php 
		$this->load->view('template/header');
?>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div>Analytics Dashboard
				<div class="page-title-subheading">
					Pantauan Kegiatan transaksi Pembayaran Listrik. 
				</div>
			</div>
		</div>
	</div>
</div>
	<?php	if ($this->session->userdata('id_level') == '2' || $this->session->userdata('id_level') == '5' ) { ?>	
	<div class="row">
		<div class="col-xl-6">
			<div class="card">
				<div class="card-header">
					<h5 class="text-primary">Status Pelanggan Bulan ini</h5>
				</div>
				<div class="card-body">				
					<canvas id="chart-statuspelanggan"></canvas>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card">
			<div class="card-header">
					<h6>Import Data Penggunaan</h6>
				</div>
				<div class="card-body">
				<form method="post" action="<?php echo base_url("Penggunaan/ValidateImport"); ?>" enctype="multipart/form-data">
					<!--
					-- Buat sebuah input type file
					-- class pull-left berfungsi agar file input berada di sebelah kiri
					-->
					<input type="file" name="file">

					<!--
					-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
					-->
					<div class="row mt-4">
						<div class="col-sm-6">
							<input class="btn btn-primary" type="submit" name="preview" value="Preview">
							<a href="<?= base_url('Penggunaan/export_excel') ?>" class="btn btn-secondary">Export format</a>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">Aktivitas Pembayaran Hari ini</div>
				<div class="card-body">
					<table class="table table-stripted">
					<tr>
						<th>ID #</th>
						<th>No.KWH</th>
						<th>TAGIHAN</th>
						<th>GERAI</th>
						<th>PETUGAS</th>
					</tr>
					<?php foreach ($currentbayar as $c) {?>
						<tr>
							<td><?= $c->id_pembayaran?></td>
							<td><?= $c->nomor_kwh?></td>
							<td><?= "ID".$c->id_tagihan." Tagihan :". $c->bulan.'/'.$c->tahun?></td>
							<td><?= $c->nama_gerai?></td> 
							<td><?= $c->nama?></td>
						</tr>
					<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php }else{ ?>
		<div class="row">
			<div class="col-xl-6">
				<div class="card">
					<div class="card-header">
						<h5 class="text-primary">Histori Pembayaran Bulan ini</h5>
					</div>
					<div class="card-body">
						<table class="table table-stripted">
							<thead>
								<tr>
									<th># ID</th>
									<th>NO Kwh</th>
									<th>Tagihan</th>
									<th>Total Pembayaran</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php }?>	


	
<?php
 $this->load->view('template/footer.php'); 
?>

<script>
	<?php
	if ($this->session->userdata('id_level') == '2' || $this->session->userdata('id_level') == '5' ) { ?>
		var ctx = $('#chart-statuspelanggan');
		var myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["Diputus", "Belum Bayar", "Lunas"],
				datasets: [{
					label: '# of Votes',
					data: [<?= $sts_putus ?>, <?= $sts_unpaid ?>, <?= $sts_lunas ?>],
					backgroundColor: [
					'#ff0055',
					'yellow',
					'#00ff99',
					],
					borderWidth: 1
				}]
			},
			options: {
				
			}
		});
		<?php } ?>
	</script>