<?php $this->load->view('template/header_other.php');?>
<div class="container mt-4">
	<div class="row">
		<div class="col-xl-12">
			<h2>Layanan Kami</h2>
			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-6">
							<div class="card mt-3">
								<div class="card-body">
                        <img class="card-img-top" height="261px" src="<?= base_url()?>assets/images/gerai.jpg" alt="Card image cap">
									<h5 class="card-title mt-2">Pendaftaran Gerai PLN</h5>
									<p class="card-text">
                              Bekerja sama dengan kami dalam melayani masyarakat indonesia, Transaksi dijamin aman dan selalu dipantau prosesnya
									</p>
									<a href="<?=base_url('LayananGerai/daftargeraibaru');?>" class="btn btn-primary">REGISTRASI</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card mt-3">
								<div class="card-body">
                           <img class="card-img-top" height="261px" src="<?= base_url()?>assets/images/migrasi.jpg" alt="Card image cap">
									<h5 class="card-title mt-2">Masuk Aplikasi Gerai</h5>
									<p class="card-text">
                              Layanan permohonan Perubahan daya listrik secara online yang cepat, mudah, nyaman, dan aman serta dapat dimonitor prosesnya.
									</p>
									<a href="<?= base_url('admin')?>" class="btn btn-primary">DASHBOARD GERAI</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('template/footer_other.php');?>
