<?php $this->load->view('template/header');?>
<div class="page" id="MasterPager">
	<span class="page-title">Master Page</span>

	<div class="boxes-container  container-fluid">
		<div class="row">
			<div class="col-md-2 mb-4 col-xl-3 col-sm-2">
				<div class="boxes boxes-grid" onclick="window.location.href = 'Pelanggan'">
					<div class="boxes-icon">
						<span class="boxes-icon-img" style="color:#ed1250;"><i class="fas fa-user-friends"></i></span>
					</div>
					<div class="boxes-title" id="i-pelanggan">
						<span>Data Pelanggan</span>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-4 col-xl-3 col-sm-10">
				<div class="boxes boxes-grid" onclick="window.location.href = '<?php echo base_url('Penggunaan')?>'">
					<div class="boxes-icon">
						<span class="boxes-icon-img" style="color:#f45905;"><i class="fas fa-plug"></i></span>
					</div>
					<div class="boxes-title icon-f">
						<span>Penggunaan</span>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-4 col-xl-3 col-sm-2">
				<div class="boxes boxes-grid" onclick="window.location.href = '<?php echo base_url('Tagihan')?>'">
					<div class="boxes-icon">
						<img src="assets/css/debt.svg" alt="">
					</div>
					<div class="boxes-title">
						<span>Tagihan</span>
					</div>
				</div>
			</div>
			<div class="col-md-9 mb-4 col-xl-3 col-sm-2">
				<div class="boxes boxes-grid" onclick="window.location.href = '<?php echo base_url('Tarif')?>'">
					<div class="boxes-icon">
						<span class="boxes-icon-img" style="color:#ed1250;"><i class="fas fa-receipt"></i></span>
					</div>
					<div class="boxes-title">
						<span>Tarif</span>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php $this->load->view('template/footer');?>
