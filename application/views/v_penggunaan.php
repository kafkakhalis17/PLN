<?php $this->load->view('template/header');?>

<div class="row" id="Penggunaan">
	<div class="col-xl-12">

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
		
			<button data-toggle="modal" data-target="#inputPenggunaan" class="btn btn-primary"><i class="fas fa-save"></i> New Data</button>
			<button data-toggle="modal" data-target="#updatePenggunaanbaru" class="btn btn-primary"><i class="fas fa-plug"></i> Penggunaan</button>
		<div class="tableData pr-4">
			<table class="DataTable table table-striped" id="">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">ID </th>
						<th scope="col">No.KWH</th>
						<th scope="col">Bulan</th>
						<th scope="col">Tahun</th>
						<th scope="col">Meter Awal</th>
						<th scope="col">Meter Akhir</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody id="tbody-penggunaan">
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		// Get Data Form Dropdaown
		TableReload();
		$('.tahun').change(function () {
			var id_pelanggan = $('.searchpenggunaan').val();
			var tahun = $(this).val();
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('Penggunaan/getDate/')?>',
				data : 	{'tahun' : tahun , 'idPelanggan' : id_pelanggan},
				dataType: 'json',
				success: function (data) {	
					$('.bulan:disabled').prop("disabled",false);
					
					
					for (let i = 0; i < data.length; i++) {
						console.log(data[i].bulan);
						
						$('option[value="'+data[i].bulan+'"]').attr("disabled","disabled");

					}	
				}
			});
		});
		$('.searchpenggunaan').change(function () {
			var id_pelanggan = $('.searchpenggunaan').val();
			var tahun = $('.tahun').val();
			console.log(id_pelanggan);
			console.log(tahun);
		
			
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url('Penggunaan/getDatabaruByID/')?>'+id_pelanggan,
				dataType: 'json',
				success: function (data) {	
					// console.log(data);
				
					$('#m_awal').val(data[0].meter_akhir);
					$('#m_awalt').empty();
					$('#m_awalt').text(data[0].meter_akhir + "KWh");
					// $(':disabled').prop("disabled",false);
				}
			});
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('Penggunaan/getDate/')?>',
				data : 	{'tahun' : tahun , 'idPelanggan' : id_pelanggan},
				dataType: 'json',
				success: function (data) {	
					$('.bulan :disabled').prop("disabled",false);
					for (let i = 0; i < data.length; i++) {
						console.log(data[0].bulan);

						$('option[value="'+data[i].bulan+'"].bulan').attr("disabled","disabled");

					}	
				}
			});
		});
		
		
		// Submit Penggunaan Baru
		$('#submit-penggunaanbaru').click(function() {
			var M_awal = $('#m_awal').val();
			var M_akhir = $('#m_akhir').val();
			console.log(M_awal, M_akhir);

			
			
			if (parseInt(M_akhir)  < parseInt(M_awal) ) {
				Swal.fire({
					title: "You Cant input this !",
					text: "Your Data Must be meter akhir > meter awal",
					type: "warning"
				});
			}	
			else{
				$.ajax({
					type:'POST',
					data : $('#FormPeggunaan').serialize(),
					url : '<?php echo base_url('Penggunaan/updatePenggunaan')?>',
					success: function (data) {
						$.ajax({
							type: 'GET',
							url: '<?php echo base_url('Penggunaan/GetDatabaru')?>',
							dataType: 'json',
							success: function (dataPengguna) {
								// console.log(JSON.stringify(dataPengguna[0]));
								swal.fire({
										title: "Do you want add this data to tagihan?",
										text: "You can add this Data to Tagihan",
										type: "question",
										showCancelButton: true,
										confirmButtonColor: '#3085d6',
										cancelButtonColor: '#d33',
										confirmButtonText: 'Yes, Add it!'
									})
									.then((add) => {
										data = JSON.stringify(dataPengguna);
										
										if (add.value) {
											$.ajax({
												type:'POST',
												dataType: 'json',
												data : {
													'id_pelanggan' : dataPengguna[0].id_pelanggan,
													'bulan' : dataPengguna[0].bulan,
													'tahun' : dataPengguna[0].tahun,
													'meter_awal' : dataPengguna[0].meter_awal,
													'meter_akhir' : dataPengguna[0].meter_akhir,
													'id_penggunaan' : dataPengguna[0].id_penggunaan
												},
												url : '<?php echo base_url('Tagihan/input')?>',
												success: function (data) {
													window.location.href = "<?php echo base_url('Penggunaan')?>";
												}
											});
											return Swal.fire({
												title:'Input Succes!',
												text: 'Tagihan Ditambahkan!',
												type: 'success'
											}).then((add) => {
													window.location.reload();
											});
										} else {
											window.location.reload();
										}
									});
								}
							})	
						}	
					});
				return false;
			}
		});

	});
	function TableReload() {		
		console.log("tablereload jalan");
		
		$.ajax({	
			type: 'GET',
			url : '<?php echo base_url('Penggunaan/JsonGetPenggunaan')?>',
			dataType: 'json',
			async : false,
			success: function (dataPenggunaan) {
				var tbody ="";
			
				for (let i = 0; i < dataPenggunaan.length; i++) {
				
					$.ajax({
						type: 'GET',
						url: '<?php echo base_url('Tagihan/GetJsonTagihanByIdPenggunaan/')?>'+ dataPenggunaan[i].id_penggunaan,
						dataType: 'json',
						async : false,
						
						success : function(dataTagihan){
							var x = dataTagihan.length; 
							if (dataTagihan[0] != undefined)  {
								if (dataTagihan[0].bulan == dataPenggunaan[i].bulan && dataTagihan[0].tahun == dataPenggunaan[i].tahun) {
										tbody += '<tr>'+
											// '<td>'+data[i].nomor_kwh+'</td>'+
											'<td scope="row">'+dataPenggunaan[i].id_penggunaan+'</td>'+
											'<td>'+dataPenggunaan[i].id_pelanggan+'</td>'+
											'<td><b>'+dataPenggunaan[i].nomor_kwh+'</b> </td>'+
											'<td>'+dataPenggunaan[i].bulan+'</td>'+
											'<td>'+dataPenggunaan[i].tahun+' </td>'+
											'<td>'+dataPenggunaan[i].meter_awal+' </td>'+
											'<td>'+dataPenggunaan[i].meter_akhir+' </td>'+
											'<td>'+
												'<button  onclick="addTagihan('+dataPenggunaan[i].id_penggunaan+')" disabled  class="btn btn-primary mb-2 mr-2"><i class="fas fa-money-bill-wave"></i>Tagihan</button>'+
												'<button disabled data-toggle="modal" data-target="#upPenggunaan'+dataPenggunaan[i].id_penggunaan+'" class="btn btn-warning mb-2 mr-2"><i class="fas fa-pen-alt"></i></button><button disabled class="btn-danger btn mb-2 mr-2" onclick="Delete(\'penggunaan\','+dataPenggunaan[i].id_penggunaan+')"><i class="fas fa-trash"></i></button>'+
											'</td>'+
											'</tr>';	
								}
								// cek jika no kwh sama
								// if (dataPenggunaan[i].nomor_kwh == dataTagihan[0].nomor_kwh) {		
								// 	// cek jika bulan dan tahun sama apabila no kwh sama
								// 	if (dataTagihan[x] != undefined) {
								// 		if (dataPenggunaan[i].bulan === dataTagihan[x].bulan &&  dataPenggunaan[i].tahun === dataTagihan[x].tahun) {
								// 			console.log(dataTagihan);
								// 			tbody += '<tr>'+
								// 			// '<td>'+data[i].nomor_kwh+'</td>'+
								// 			'<td scope="row">'+dataPenggunaan[i].id_penggunaan+'</td>'+
								// 			'<td>'+dataPenggunaan[i].id_pelanggan+'</td>'+
								// 			'<td><b>'+dataPenggunaan[i].nomor_kwh+'</b> </td>'+
								// 			'<td>'+dataPenggunaan[i].bulan+'</td>'+
								// 			'<td>'+dataPenggunaan[i].tahun+' </td>'+
								// 			'<td>'+dataPenggunaan[i].meter_awal+' </td>'+
								// 			'<td>'+dataPenggunaan[i].meter_akhir+' </td>'+
								// 			'<td>'+
								// 				'<button onclick="addTagihan('+dataPenggunaan[i].id_penggunaan+')" disabled  class="btn btn-primary mb-2 mr-2"><i class="fas fa-money-bill-wave"></i>Tagihan</button>'+
								// 				'<button data-toggle="modal" data-target="#upPenggunaan'+dataPenggunaan[i].id_penggunaan+'" class="btn btn-warning mb-2 mr-2"><i class="fas fa-pen-alt"></i></button><button class="btn-danger btn mb-2 mr-2" onclick="Delete(\'penggunaan\','+dataPenggunaan[i].id_penggunaan+')"><i class="fas fa-trash"></i></button>'+
								// 			'</td>'+
								// 			'</tr>';		
								// 			x--
								// 		}else{
								// 			tbody += '<tr>'+
								// 			// '<td>'+data[i].nomor_kwh+'</td>'+
								// 			'<td scope="row">'+dataPenggunaan[i].id_penggunaan+'</td>'+
								// 			'<td>'+dataPenggunaan[i].id_pelanggan+'</td>'+
								// 			'<td><b>'+dataPenggunaan[i].nomor_kwh+'</b> </td>'+
								// 			'<td>'+dataPenggunaan[i].bulan+'</td>'+
								// 			'<td>'+dataPenggunaan[i].tahun+' </td>'+
								// 			'<td>'+dataPenggunaan[i].meter_awal+' </td>'+
								// 			'<td>'+dataPenggunaan[i].meter_akhir+' </td>'+
								// 			'<td>'+
								// 				'<button onclick="addTagihan('+dataPenggunaan[i].id_penggunaan+')"  class="btn btn-primary mb-2 mr-2"><i class="fas fa-money-bill-wave"></i>Tagihan</button>'+
								// 				'<button data-toggle="modal" data-target="#upPenggunaan'+dataPenggunaan[i].id_penggunaan+'" class="btn btn-warning mb-2 mr-2"><i class="fas fa-pen-alt"></i></button><button class="btn-danger btn mb-2 mr-2" onclick="Delete(\'penggunaan\','+dataPenggunaan[i].id_penggunaan+')"><i class="fas fa-trash"></i></button>'+
								// 			'</td>'+
								// 			'</tr>';		
								// 		}			
								// 	}else{
								// 		tbody += '<tr>'+
								// 			// '<td>'+data[i].nomor_kwh+'</td>'+
								// 			'<td scope="row">'+dataPenggunaan[i].id_penggunaan+'</td>'+
								// 			'<td>'+dataPenggunaan[i].id_pelanggan+'</td>'+
								// 			'<td><b>'+dataPenggunaan[i].nomor_kwh+'</b> </td>'+
								// 			'<td>'+dataPenggunaan[i].bulan+'</td>'+
								// 			'<td>'+dataPenggunaan[i].tahun+' </td>'+
								// 			'<td>'+dataPenggunaan[i].meter_awal+' </td>'+
								// 			'<td>'+dataPenggunaan[i].meter_akhir+' </td>'+
								// 			'<td>'+
								// 				'<button onclick="addTagihan('+dataPenggunaan[i].id_penggunaan+')"   class="btn btn-primary mb-2 mr-2"><i class="fas fa-money-bill-wave"></i>Tagihan</button>'+
								// 				'<button data-toggle="modal" data-target="#upPenggunaan'+dataPenggunaan[i].id_penggunaan+'" class="btn btn-warning mb-2 mr-2"><i class="fas fa-pen-alt"></i></button><button class="btn-danger btn mb-2 mr-2" onclick="Delete(\'penggunaan\','+dataPenggunaan[i].id_penggunaan+')"><i class="fas fa-trash"></i></button>'+
								// 			'</td>'+
								// 			'</tr>';	
								// 	}	
								// } 
							}else{
								tbody += '<tr>'+
								// '<td>'+data[i].nomor_kwh+'</td>'+
								'<td scope="row">'+dataPenggunaan[i].id_penggunaan+'</td>'+
								'<td>'+dataPenggunaan[i].id_pelanggan+'</td>'+
								'<td><b>'+dataPenggunaan[i].nomor_kwh+'</b> </td>'+
								'<td>'+dataPenggunaan[i].bulan+'</td>'+
								'<td>'+dataPenggunaan[i].tahun+' </td>'+
								'<td>'+dataPenggunaan[i].meter_awal+' </td>'+
								'<td>'+dataPenggunaan[i].meter_akhir+' </td>'+
								'<td>'+
									'<button onclick="addTagihan('+dataPenggunaan[i].id_penggunaan+')"  class="btn btn-primary mb-2 mr-2"><i class="fas fa-money-bill-wave"></i>Tagihan</button>'+
									'<button data-toggle="modal" data-target="#upPenggunaan'+dataPenggunaan[i].id_penggunaan+'" class="btn btn-warning mb-2 mr-2"><i class="fas fa-pen-alt"></i></button><button class="btn-danger btn mb-2 mr-2" onclick="Delete(\'penggunaan\','+dataPenggunaan[i].id_penggunaan+')"><i class="fas fa-trash"></i></button>'+
								'</td>'+
								'</tr>';		
							}
						}
					});				
				} /* end of loop */	
				$("#tbody-penggunaan").append(tbody);
			}
		}); // End of ajax Table
	}
	function addTagihan(idPenggunaan) {
		swal.fire({
			title: "Do you want add this data to tagihan?",
			text: "You can add this Data to Tagihan",
			type: "question",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Add it!'
		}).then((result) => {
			if (result.value) {
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url('Penggunaan/GetPenggunaanID/')?>'+idPenggunaan,
				dataType: 'json',
				success: function (dataPengguna) {
					console.log(dataPengguna);
					$.ajax({
						type:'POST',
						dataType: 'json',
						data : {
							'id_pelanggan' : dataPengguna[0].id_pelanggan,
							'bulan' : dataPengguna[0].bulan,
							'tahun' : dataPengguna[0].tahun,
							'meter_awal' : dataPengguna[0].meter_awal,
							'meter_akhir' : dataPengguna[0].meter_akhir,
							'id_penggunaan' : dataPengguna[0].id_penggunaan
						},
						url : '<?php echo base_url('Tagihan/input')?>',
						success: function (data) {
								
						}
					});
					return Swal.fire({
						title:'Input Succes!',
						text: 'Tagihan Ditambahkan!',
						type: 'success'
					}).then((add) => {
						window.location.reload();
					});
				}
			});
			}
		});
	}
</script>
<?php $this->load->view('template/footer');?>
<?php $this->load->view('template/modal/modal-inputPenggunaan');?>
<?php $this->load->view('template/modal/modal-upPenggunaan');?>
<?php $this->load->view('template/modal/modal-penggunaan');?>