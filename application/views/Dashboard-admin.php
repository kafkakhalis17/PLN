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
			<div class="card mb-3">
				<div class="card-header">
					<h6 class="text-primary">Status Pelanggan Bulan ini</h6>
				</div>
				<div class="card-body">				
					<!-- <canvas id="chart-statuspelanggan"></canvas> -->
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tabs-eg-77">
							<div class="card mb-3 widget-chart widget-chart2 text-left w-100">
									<div class="widget-chat-wrapper-outer">
										<div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
											<canvas id="chart-statuspelanggan"></canvas>
										</div>
									</div>
							</div>
							<h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Aktifitas Pembayaran</h6>
							<div class="scroll-area-sm">
								<div class="scrollbar-container ps ps--active-y">
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
											<td><?= "ID".$c->id_tagihan." Tagihan(". $c->bulan.'/'.$c->tahun.")"?></td>
											<td><?= $c->nama_gerai?></td> 
											<td><?= $c->nama?></td>
										</tr>
									<?php } ?>
								</table>
								<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 200px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 139px;"></div></div></div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card mb-3">
				<div class="card-header">
					<h6>Rekonsiliasi Gerai</h6>
				</div>
				<div class="card-body">
					<table class="table table-hover">
						<thead>
							<th class="text-center">Nama Gerai</th>
							<th class="text-center">Lokasi Gerai</th>
							<th class="text-center">jumlah Aktifitas</th>
							<th class="text-center">Aksi</th>
						</thead>
						<tbody>
							<?php foreach ($geraiaktif as $row ) {?>
								<tr>
								<td><?= $row['namagerai']?></td>
								<td><?= $row['lokasi']?></td>
								<td><?= $row['jumlahaktifitas']  ?></td>
								<td><a class="btn btn-primary" href="<?= base_url('Gerai/cetakrekon/').$row['idgerai']?>">Cetak Rekon</a></td>
								</tr>
							<?php	} ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="card mb-3">
			<div class="card-header">
					<h6>Import Data Penggunaan</h6>
				</div>
				<div class="card-body">
				<form method="post" action="<?php echo base_url("Penggunaan/ValidateImport"); ?>" enctype="multipart/form-data">
					<!--
					-- Buat sebuah input type file
					-- class pull-left berfungsi agar file input berada di sebelah kiri
					-->
					<input type="file" name="file"  accept=".xlsx, .xls, .csv"/>

					<!--
					-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
					-->
					<div class="row mt-4">
						<div class="col-sm-6">
							<input class="btn btn-primary"  type="submit" name="preview" value="Preview">
							<a href="<?= base_url('Penggunaan/export_excel') ?>" class="btn btn-secondary">Export format</a>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			
		</div>
		
	</div>

	
	<?php }else{ ?>
		<div class="row">
			<div class="col-xl-12">
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
							<?php foreach ($historigerai as $hg) {?>
								<tr>
									<td><?= $hg->id_pembayaran?></td>
									<td><?= $hg->nomor_kwh?></td>
									<td><?= "ID".$hg->id_tagihan." Tagihan(". $hg->bulan.'/'.$hg->tahun.")"?></td>
	1								<td><?= "Rp.". number_format($hg->total,2,',','.')?></td>
								</tr>
							<?php }?>
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
					'#ffd500',
					'#008223',
					],
					borderWidth: 1
				}]
			},
			options: {
				
			}
		});
		<?php } ?>
	</script>