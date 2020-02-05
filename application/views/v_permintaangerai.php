<?php $this->load->view('template/header');?>

<div class="row" >
	<div class="col-xl-12">

		<!-- HEader  -->

		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Verifikasi Data Pasang Baru
						<div class="page-title-subheading">
							Penghitung Total pembayaran listrik 
						</div>
					</div>
				</div>
			</div>
		</div>
      <!-- section -->
      <div class="mb-3 card">
         <div class="card-header">
            <ul class="nav nav-justified">
               <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link">Verifikasi Data</a></li>
            </ul>
         </div>
         <div class="card-body">
            <div class="tab-content">
               <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="loading-image loading-table text-center">
                           <img src="<?= base_url('assets/images/loading-img.gif')?>" alt="">
                        </div>
                        <div id="tablesec">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover DataTable" >
                           <thead>
                           <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">Nama Gerai</th>
                              <th class="text-center">Alamat</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Actions</th>
                           </tr>
                           </thead>
                           <tbody id="tbody-verifikasi">
                           </tbody>
                        </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	</div>
</div>
<script>
   $(document).ready(function () {
       // Refresh data on table 
      refreshdataverifikasi();
      setInterval(function(){  refreshdataverifikasi(); }, 3000);
   });
   // Toggle Modal detail 
   function GetDetail(id) {
      $.ajax({
         type: 'GET',
         url: '<?= base_url('Gerai/getdetailmodal/')?>'+ id,
         beforeSend: function(){
            $('.loading-modal').show();
         },
         complete: function(){
            $('.loading-modal').hide();
         },
         success: function (data) {
            $('#detail-data').html(data);
            // $('#modal-footer-permohonan').
         }
      });
   }
   function refreshdataverifikasi() { 
         $.ajax({
            type: 'get',
            async : false,
            url: '<?= base_url('Gerai/getverifkasi')?>',
            dataType: 'json',
            beforeSend: function(){
               $('.loading-table').show();
               $('#tablesec').hide();
            },
            complete: function(){
               $('.loading-table').hide();
            },
            success: function(datapermohonan){
               $('.loading-table').hide();
               $('#tablesec').show();
               var rowpasang = "";
               var rowverifikasi = "";
               var rowbayar ="";
               for (let i = 0; i < datapermohonan.length; i++) {
                  
                     rowverifikasi +=  '<tr>'+
                     '<td class="text-center text-muted">#'+ datapermohonan[i].id_gerai +'</td>'+
                     '<td>'+
                        '<div class="widget-content p-0">' +
                           '<div class="widget-content-wrapper">' +
                              '<div class="widget-content-left flex2">' +
                                    '<div class="widget-heading">'+ datapermohonan[i].nama_gerai +'</div>' +
                                    '<div class="widget-subheading opacity-7">'+ datapermohonan[i].nama_penanggungjawab +'</div>' +
                              '</div>' +
                           '</div>' +
                        '</div>' +
                     '</td>' +
                  '<td class="text-center">'+ datapermohonan[i].alamat_gerai +'</td>' +
                  '<td class="text-center">' +
                     '<div class="badge badge-warning">BELUM TERVIRIFIKASI</div>' +
                     '</td>' +
                  '<td class="text-center">' +
                     '<button type="button" class="btn btn-primary" onclick="GetDetail('+ datapermohonan[i].id_gerai +')" data-toggle="modal" data-target="#detail">Detail</button>' +
                  '</td>' +
                  '</tr>';                  
               }
               $('#tbody-verifikasi').empty();  
               $('#tbody-verifikasi').append(rowverifikasi);
               // $('#tbody-verifikasi').append(row);
            }
         });  
   }
   // this function is for verifcation data 
   function verifikasi() {
      var id = $('#idsambungan').val();
      swal.fire({
				title: "Yakin ?",
				text:  "Verifikasi Data ini dan akan diproses lebih lanjut",
				type:  "warning",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Verifikasi Data ini'
			})
			.then((willDelete) => {
				if (willDelete.value) {
               $.ajax({
                  type: 'POST',
                  url: '<?= base_url('Gerai/Verifikasi/')?>'+ id,
                  beforeSend: function(){
                     $('#detail-data').empty();
                     $('#tbody-verifikasi').empty();
                     $('.loading-modal').show();
                  },
                  complete: function(){
                     $('.loading-modal').hide();
                  },
                  success: function (data) {
                     window.location.href ="<?= base_url('Gerai/permintaan')?>";
                  }
               });
               return false;
				} else {
					swal.fire({
						title :'Cancelled',
						text :'Your imaginary file is safe :)',
						type :'error'
					});
				}
			});
   }

   function unverifikasi() {
      var id = $('#idsambungan').val();
      swal.fire({
				title: "Yakin ?",
				text:  "Unverifikasi Data ini",
				type:  "warning",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Verifikasi Data ini'
			})
			.then((willDelete) => {
				if (willDelete.value) {
               $.ajax({
                  type: 'POST',
                  url: '<?= base_url('Gerai/unverifikasi/')?>'+ id,
                  beforeSend: function(){
                     $('#detail-data').empty();
                     $('#tbody-verifikasi').empty();
                     $('.loading-modal').show();
                  },
                  complete: function(){
                     $('.loading-modal').hide();
                  },
                  success: function (data) {
                     window.location.href ="<?= base_url('Gerai/permintaan')?>";
                  }
               });
               return false;
				} else {
					swal.fire({
						title :'Cancelled',
						text :'Your imaginary file is safe :)',
						type :'error'
					});
				}
			});
   }
</script>
<?php $this->load->view('template/footer');?>
<?php $this->load->view('template/modal/modal-detailpermohonan');?>