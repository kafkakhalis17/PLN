<?php $this->load->view('template/header_other.php');?>
<div class="container mt-4">
	<div class="row">
		<div class="col-xl-12">
			<h2>Layanan Kami</h2>
			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-12">
							<div class="card mt-3">
								<div class="card-body">
                        <img class="card-img-top" height="390px" src="<?= base_url()?>assets/images/layananpemasangan.jpg" alt="Card image cap">
									<h5 class="card-title mt-2">Sambungan baru</h5>
									<p class="card-text">
                           Layanan permohonan penyambungan baru listrik secara online yang cepat, mudah, nyaman, dan aman serta dapat dimonitor prosessnya.
									</p>
									<a href="<?=base_url('LayananPelanggan/daftarsambunganbaru');?>" class="btn btn-primary">PASANG SAMBUNGAN</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card mt-3">
								<div class="card-body">
                           <img class="card-img-top" height="261px" src="<?= base_url()?>assets/images/migrasi.jpg" alt="Card image cap">
									<h5 class="card-title mt-2">Perubahan Daya/Migrasi</h5>
									<p class="card-text">
                              Layanan permohonan Perubahan daya listrik secara online yang cepat, mudah, nyaman, dan aman serta dapat dimonitor prosesnya.
									</p>
									<a href="#" class="btn btn-primary">MIGRASI SAMBUNGAN</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card mt-3">
								<div class="card-body">
                           <img class="card-img-top" height="261px" src="<?= base_url()?>assets/images/migrasi.jpg" alt="Card image cap">
									<h5 class="card-title mt-2">Pemutusan Daya</h5>
									<p class="card-text">
                              Layanan permohonan Perubahan daya listrik secara online yang cepat, mudah, nyaman, dan aman serta dapat dimonitor prosesnya.
									</p>
									<a href="<?=base_url('LayananPelanggan/putussambungan');?>" class="btn btn-primary">PUTUS SAMBUNGAN</a>
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
