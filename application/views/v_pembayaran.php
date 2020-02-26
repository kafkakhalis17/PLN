	<?php $this->load->view('template/header');?>
		<!-- HEader  -->
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Pembayaran Listrik
						<div class="page-title-subheading">
							Penghitung Total pembayaran listrik 
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Header -->
		<!-- <div class="button-container">
			<button data-toggle="modal" data-target="#inputTagihan" class="btn btn-input">Input</button>
		</div> -->
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-md-4">
					<div class="card"> 
						<div class="card-header">
							<h5 class="text-primary">Cari Tagihan</h5>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="col-12">
									<label for="">masukan No.KWH</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
										</div>
										<input class="form-control" type="number" name="NoPelangggan" id="NoKwh">
									</div>
								</div>
								<div class="col-12">
									<button type="button" id="Search-btn" class="Search-btn btn btn-block btn-primary"><i class="fas fa-search"></i> Cari Data</button>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="col-xl-8 col-md-8">
						<div class="card w-100">
							<div class="card-body overflow-auto">
							<h2>Data Pembayaran</h2>
						
									<table class="t-Datap">
										<tr>
											<td>
												<h5>No. Kwh</h5>
											</td>
											<td>
												<h5><span id="Kwht"></span></h5>
											</td>
										</tr>
										<tr>
											<td>
												<h5>Name</h5>
											</td>
											<td>
												<h5><span id="Name"></span></h5>
											</td>
										</tr>
									</table>
									<h3>Tagihan yang Belum Dibayar</h3>

									<table class="t-bayar table table-striped">
										<thead>
											<tr>
												<th>Bulan</th>
												<th>Tahun</th>
												<th>Jumlah Meter</th>
												<th>Status</th>
												<th>Bayar</th>
												<th>Tambahkan</th>
											</tr>
										</thead>
										<tbody id="tbody-bayar">
										
										</tbody>
									</table>

								<h2>Total <span id="total-t">Rp.0</span></h2>
								<button data-toggle="modal" data-target="#Bayar" disabled class="btn btn-success btn-bayar"><h3>Bayar</h3></button>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php $this->load->view('template/footer');?>
<?php $this->load->view('template/modal/modal-bayar');?>
<script>

	

		// $(":checkbox").change( function(){
		// 	console.log("Berhasil");
		// });
	
	$(document).ready(function () {

		
		$('#NoKwh').keydown(function(){
			if ($('#NoKwh').val()=="") {
				$('#Search-btn').prop("disabled",false);
				$('#tbody-bayar').children().remove();
				$('#Name').text("");
				$('.Name').text("");
				$('#Kwht').text("");
				$('.Kwht').text("");
				$('#total-t').text("Rp.0");
				$('.btn-bayar').prop('disabled',true);
				
			}	
		});

		

		$('#Search-btn').click(function () {
	
			var nokwh = $('#NoKwh').val();
			// Get Data Tagihan
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url('Pembayaran/CariPembayaran/')?>'+nokwh,
				dataType: 'json',
				async : false,
				success: function (data) {
					if (data == "") {
						Swal.fire(
							'Data is not Found !',
							'Try with another ID Number !',
							'error'
						);
					}else{

						$('#Kwht').text(data[0].nomor_kwh);
						$('.Kwht').text(data[0].nomor_kwh);
						$('#Name').text(data[0].nama_pelanggan);
						$('.Name').text(data[0].nama_pelanggan);
						console.log(data);
						var tbody ="";
						//  Data Tagihan pelanggan
						for (let i = 0; i < data.length; i++) {
							var databayar = parseInt(data[i].bayar);
							var datadenda = parseInt(data[i].tarif_denda); 
							var intbayar =  databayar + datadenda;
							console.log(intbayar);
							console.log(databayar);
							console.log(datadenda);
							
							
							
							var Hargadenda = formatRupiah(String(intbayar), 'Rp.');
							var Harga = formatRupiah(data[i].bayar, 'Rp.');
						
							var Angka = data[i].bayar;
							if (data[i].status == 'nunggak') {
								tbody += 	'<tr>'+
											// '<td>'+data[i].nomor_kwh+'</td>'+
											'<td><span class="d-bulan'+i+'">'+data[i].bulan+'</span></td>'+
											'<td>'+data[i].tahun+'</td>'+
											'<td>'+data[i].jumlah_meter+' Kwh </td>'+
											'<td><div class="badge badge-warning">'+data[i].status+'</div></td>'+
											'<td> <span class="total">'+ Hargadenda  +'</span></td>'+
											'<td><center><input id_tagihan="tagihan:'+data[i].id_tagihan+'" type="checkbox" value="'+intbayar+'" name="'+data[i].bulan+''+data[i].tahun+'" class="ctotal"></center></td>'+
										'</tr>';
							}else{
								tbody += '<tr>'+
											// '<td>'+data[i].nomor_kwh+'</td>'+
											'<td><span class="d-bulan'+i+'">'+data[i].bulan+'</span></td>'+
											'<td>'+data[i].tahun+'</td>'+
											'<td>'+data[i].jumlah_meter+' Kwh </td>'+
											'<td><div class="badge badge-warning">'+data[i].status+'</div></td>'+
											'<td> <span class="total">'+ Harga +'</span></td>'+
											'<td><center><input id_tagihan="tagihan:'+data[i].id_tagihan+'" type="checkbox" value="'+data[i].bayar+'" name="'+data[i].bulan+''+data[i].tahun+'" class="ctotal"></center></td>'+
										'</tr>';
							} 										
						}
						$('#tbody-bayar').append(tbody);
						$('#Search-btn').attr("disabled","disabled");
						$('#jTarif').append(data[0].daya);
					}
					
				}
			});
		});
	});

	$("#tbody-bayar").on("click", ":checkbox.ctotal", function(){	
		if ($(this).is(':checked')) {
			var checkboxval = [];
			var idTagihan = [];
			$.each($(':checked.ctotal'), function(){
				checkboxval.push(parseInt($(this).val()));
				$('.btn-bayar').prop('disabled',false);
				console.log(checkboxval);
			});
				$.each($(this), function(){
					idTagihan.push($(this).attr('id_tagihan'));
            });
			
			if (checkboxval === undefined || checkboxval < 1) {
				$('#total-t').empty();
				$('#bulan-li').empty();
				$('#modal-total-bayar').empty();
				$('#Data-bayar').empty();
				$('#modal-total-bayar').text("Rp.0");
				$('#total-t').text("Rp.0");
			}else{
				console.log(idTagihan);
				var hasil = checkboxval.reduce(JumlahFunc);
				var Format = String(hasil);
				var tform="";
				const badmin = 2500;	
				const tharga = badmin + hasil;

				for (let i = 0; i < idTagihan.length; i++) {
					var dataBayar ="";
					var dataArr = idTagihan[i].split(":");
					var id = dataArr[1];
					
					
					$.ajax({
						type: 'GET',
						url: '<?php echo base_url('Pembayaran/CariPembayaranByid/')?>'+id,
						dataType: 'json',
						async : false,
						success: function (data) {
					
							dataBayar += '<tr>'+
											'<td>'+data[i].tahun+'</td>'+
											'<td>'+data[i].bulan+'</td>'+
										 '</tr>';
							$('#Data-bayar').append(dataBayar);
							// console.log(data[i].tahun);
						}
					});
				}

				
				$('#total-t').empty();
				$('#total-t').append(formatRupiah(Format, 'Rp.'));
				$('#modal-total-bayar').empty();
				$('#modal-total-bayar').append(formatRupiah(String(tharga), 'Rp.'));
			}
			
		}else{
			var checkboxval = [];
			var idTagihan = [];
			$.each($("input.ctotal:checked"), function(){
				checkboxval.push(parseInt($(this).val()));
				console.log(checkboxval);
			});
			$.each($("input.ctotal:checked"), function(){
				idTagihan.push($(this).attr('id_tagihan'));
            });
			console.log(idTagihan);
			
			if (checkboxval=== undefined || checkboxval < 1) {
				$('.btn-bayar').prop('disabled',true);
				$('#total-t').empty();
				$('#total-t').text("Rp.0");
				$('#modal-total-bayar').empty();
				$('#Data-bayar').empty();
				$('#modal-total-bayar').text("Rp.0");
				$('#bulan-li').empty();
			}else{
				var tform="";	
				var hasil = checkboxval.reduce(JumlahFunc);
				var Format = String(hasil);
				const badmin = 2500;	
	
				const tharga = badmin + hasil;
				$('#Data-bayar').empty();

				for (let i = 0; i < idTagihan.length; i++) {
					console.log(i);
					
					var dataBayar ="";
					var dataArr = idTagihan[i].split(":");
					var id = dataArr[1];
					$.ajax({
						type: 'GET',
						url: '<?php echo base_url('Pembayaran/CariPembayaranByid/')?>'+id,
						dataType: 'json',
						async : false,
						success: function (data) {							
							dataBayar += '<tr>'+
											'<td>'+data[0].tahun+'</td>'+
											'<td>'+data[0].bulan+'</td>'+
										 '</tr>';
							$('#Data-bayar').append(dataBayar);
						}
					});
				}
				$('#total-t').empty();
				$('#total-t').append(formatRupiah(Format, 'Rp.'));
				$('#modal-total-bayar').empty();
				$('#modal-total-bayar').append(formatRupiah(String(tharga), 'Rp.'));
			}
		}
		
		function JumlahFunc(total, num) {
			return total + num;
		}
	});

	$('.btn-bayar').click(function() {
		var today = new Date();
		var month = parseInt(today.getMonth()+1);
	 	window.now =  today.getFullYear() +'-'+  month +'-'+today.getDate() ;
		$('#tanggal-b').empty();
		$('#tanggal-b').append(window.now);

	});

	$("#btn-validasibayar").click(function () {
		
		var idTagihan = [];
		var total =[];
		var nokwh = $('#Kwht').text();
		var nama = $('#Name').text();
		$.each($("input.ctotal:checked"), function(){
			idTagihan.push($(this).attr('id_tagihan'));
			total.push($(this).val());
			// console.log(total);
        });
		for (let i = 0; i < idTagihan.length; i++) {
			var dataArr = idTagihan[i].split(":");
			var id = dataArr[1];
			console.log(id);
			
			$.ajax({
			type: 'GET',
				url: '<?php echo base_url('Tagihan/GetJsonTagihanByID/')?>'+id,
				dataType: 'json', 
				success: function (datatagihan) {
					console.log(datatagihan);
					// console.log(id);
					$.ajax({
						type:'POST',
						dataType: 'json',
						data : {
							'id_tagihan' : datatagihan[0].id_tagihan,
							'id_pelanggan' : datatagihan[0].id_pelanggan,
							'bulan' : datatagihan[0].bulan,
							'tahun' : datatagihan[0].tahun,
							'tanggalB' : window.now,
							'total' : total[0],
						},
						url : '<?php echo base_url('Pembayaran/bayar')?>',
						success: function (data) {
						}
					});
					
				}
			});
		}
		$(document).ajaxStop(function(){
			window.location.reload();
		});
	});

	
	function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>
