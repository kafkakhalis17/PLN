<?php $this->load->view('template/header_other.php');?>
<div class="container mt-3">
	<div class="row">
		<div class="col-xl-12">
			<h2>Pemutusan Sambungan</h2>
			<!-- <nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url();?>/LayananPelanggan">Home</a></li>
					<li class="breadcrumb-item active" id="breadcrumb-provision" aria-current="page"><a href
							id="ketentuan-link">Kententuan dan Peraturan</a></li>
					<li class="breadcrumb-item d-none" id="breadcrumb-formpedaftaran" aria-current="page">Form Pendaftaran
					</li>
				</ol>
			</nav> -->
			<div class="row">
				<div class="col-xl-12">
					<div class="form-action ">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
									aria-controls="home" aria-selected="true">Data Pelanggan</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                        <div class="container mt-5">
                           <div class="row">
                              <div class="col-xl-12">
                                 <div class="row justify-content-md-center">
                                    <div class="col-xl-6"><h4>Cari Data Sambungan</h4></div>
                                    <div class="col-xl-6">
                                       <div class="input-group mb-3">
                                          <input type="text" class="form-control" id="cari_kwh" placeholder="Seacrh No.KWh" aria-label="Recipient's username"  aria-describedby="button-addon2">
                                          <div class="input-group-append">
                                             <button class="btn btn-outline-secondary"  onclick="cari_kwh()"type="button" id="button-addon2">Search</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
								<div class="container mt-3">
                           <div class="row">
                              <div class="col-xl-12">
                                 <div class="card">
                                    <div class="card-body">
                                       <form class="form-pendaftaran"  id="form-pelanggan">
                                          <div class="form-row">
                                             <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" required class="form-control" name="nama_plgn" id="nama-plgn">
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label for="exampleInputPassword1">NPWP</label>
                                                <input type="text" name="npwp-plgn" maxlength="15" required class="form-control" id="npwp-plgn">
                                             </div>
                                            
                                             <div class="form-group col-md-2">
                                                <label for="Alamat">Alamat</label>
                                                <select class="form-control" name="jenis-jalan" id="JenisalamatDropdown">
                                                   <option value="jalan">JALAN</option>
                                                </select>
                                             </div>
                                             <div class="form-group col-md-10">
                                                <input type="text" name="alamat-pelanggan" id="alamat-plgn" style="margin-top:33px" required
                                                   class="form-control" id="alamat_plgn">
                                                <small class="form-text text-muted">*Isi dengan nama dusun/jalan, blok,/no rumah
                                                   dan RT RW ex:Jl.Amarta VI Blok db6/No.2 RT.01 RW.05</small>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label for="Notelp">No telp</label>
                                                <input type="text" maxlength="12" name="notelp1" required class="form-control" id="telp1_plgn">
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label for="Notelp">No telp 2</label>
                                                <input type="text" maxlength="12" name="notelp2" required class="form-control" id="telp2_plgn">
                                                <!-- <small class="form-text text-muted">*Jika anda merasa no telp pertama bisa
                                                   dihubungi silakan kosongkan </small> -->
                                             </div>
                                             <div class="form-group col-md-12">
                                                <label for="noktp">NIK</label>
                                                <input type="text" maxlength="16"  name="noktp" required class="form-control" id="noktp-plgn">
                                             </div>
															<div class="form-group col-md-12">
                                                <label for="noktp">NO KWH</label>
                                                <input type="text" maxlength="16"  name="nokwh" required class="form-control" id="nokwh">
                                             </div>
                                          </div>
                                          <button type="button" onclick="submitform()" class="btn btn-primary">Submit</button>
                                       </form>
                                    </div>  
                                 </div>
                              </div>
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
	<script>
	function copydata() {
			if($('.copyvalue').prop("checked") == true){
				var nama = $('#nama-plgn').val();
				var ktp = $('#noktp-plgn').val();
				var telp1 = $('#telp1_plgn').val(); 
				var telp2 = $('#telp2_plgn').val(); 
				var alamat = $('#alamat-plgn').val();

				$('#nama-pemohon').val(nama);
				$('#nik-pemohon').val(ktp);
				$('#notelp1-pemohon').val(telp1);
				$('#notelp2-pemohon').val(telp2);
				$('#alamat-pemohon').val(alamat);
			}
			else if($('.copyvalue').prop("checked") == false){
					
				$('#nama-pemohon').val("");
				$('#nik-pemohon').val("");
				$('#notelp1-pemohon').val("");
				$('#notelp2-pemohon').val("");
				$('#alamat-pemohon').val("");
			}
		}
	</script>
	<script>
		// input data
		function submitform() {
			if ($('#nama-pemohon').val() == "" || $('#nik-pemohon').val() == "" || $('alamat-pemohon').val() == "" || $('#telp1-pemohon').val() == "" || $('#email-pemohon').val() == "") {
				Swal.fire(
					'Data tidak Lengkap',
					'Masukan data Pemohon',
					'warning'
				);
			}else{
				$.ajax({
					type : 'POST',
					url  : '<?php echo base_url('LayananPelanggan/putussambunganinput')?>',
					data : $('.form-pendaftaran').serialize(),
					success : function (data) {
						Swal.fire(
						'Berhasil',
						'Data Berhasil di Kirim',
						'success'
						)
					},
					error: function(xhr, status, error) {
						alert(xhr.responseText);
					}
				});
			}
		}

		function cari_kwh() {
			var id = $('#cari_kwh').val();
			$.ajax({
				type : 'GET',
				dataType: 'json', 
				url : '<?= base_url('LayananPelanggan/carikwh/')?>'+ id,
				success : function (data) {

					$('#nama-plgn').val(data[0].nama_pelanggan);
					$('#npwp-plgn').val(data[0].npwp);
					$('#alamat-plgn').val(data[0].alamat);
					$('#telp1_plgn').val(data[0].no_telp);
					$('#telp2_plgn').val(data[0].no_telp2);
					$('#noktp-plgn').val(data[0].no_ktp);
					$('#nokwh').val(data[0].nomor_kwh);
					// $('#namanpwp').val(data[0].notelp);
					// $('#alamat-npwp').val(data[0].notelp);


				}
			});
		}
	</script>

