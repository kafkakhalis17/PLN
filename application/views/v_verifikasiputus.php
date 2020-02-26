<?php $this->load->view('template/header');?>
<div class="app-page-title">
   <div class="page-title-wrapper">
      <div class="page-title-heading">
         <div class="page-title-icon">
            <i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
            </i>
         </div>
         <div>Putus Sambungan PLN
            <div class="page-title-subheading">
              Verifikasi Putus sambungan
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-xl-12"> 
      <div class="card">
         <div class="card-header">
            <ul class="nav nav-justified">
                  <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link">Verifikasi Pemutusan Total</a></li>
                  <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link">Verifikasi Pemutusan Sementara</a></li>
                  <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link">Verifikasi Pemasangan</a></li>
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
                                    <th class="text-center">Nama</th>
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
                  <div class="tab-pane" id="tab-eg7-0" role="tabpanel">
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
                                 <th class="text-center">Nama</th>
                                 <th class="text-center">Alamat</th>
                                 <th class="text-center">Status</th>
                                 <th class="text-center">Actions</th>
                              </tr>
                              </thead>
                              <tbody id="tbody-verifikasibayar">
                              </tbody>
                           </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
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
                                 <th class="text-center">Nama</th>
                                 <th class="text-center">Alamat</th>
                                 <th class="text-center">Status</th>
                                 <th class="text-center">Actions</th>
                              </tr>
                              </thead>
                              <tbody id="tbody-verifikasiputussementara">
                              </tbody>
                           </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="tab-eg7-2" role="tabpanel">
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
                              <th class="text-center">Nama</th>
                              <th class="text-center">Alamat</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Actions</th>
                           </tr>
                           </thead>
                           <tbody id="tbody-verifikasipasang">
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
<?php $this->load->view('template/footer');?>
<?php $this->load->view('template/modal/modal-detailpermohonan');?>
<script>
   $(document).ready(function () {
      refreshdataverifikasi();
      setInterval(function(){  refreshdataverifikasi(); }, 3000);
   });

   function GetDetail(id) {
      $.ajax({
         type: 'GET',
         url: '<?= base_url('Pelanggan/getdetailmodal/')?>'+ id,
         beforeSend: function(){
            $('.loading-modal').show();
         },
         complete: function(){
            $('.loading-modal').hide();
         },
          
      });
   }

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
                  url: '<?= base_url('Pelanggan/verifikasiputussambungan/')?>'+ id,
                  beforeSend: function(){
                     $('#detail-data').empty();
                     $('#tbody-verifikasi').empty();
                     $('.loading-modal').show();
                  },
                  complete: function(){
                     $('.loading-modal').hide();
                  },
                  success: function (data) {
                     window.location.href ="<?= base_url('Pelanggan/putussambungan')?>";
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
   

   function refreshdataverifikasi() { 
      $.ajax({
         type: 'get',
         async : false,
         url: '<?= base_url('pelanggan/getDataputus')?>',
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
            var row ="";
            for (let i = 0; i < datapermohonan.length; i++) {
               if (datapermohonan[i].status == "401") {
                  rowverifikasi +=  '<tr>'+
                  '<td class="text-center text-muted">#'+ datapermohonan[i].nomor_kwh +'</td>'+
                  '<td>'+
                     '<div class="widget-content p-0">' +
                        '<div class="widget-content-wrapper">' +
                           '<div class="widget-content-left flex2">' +
                                 '<div class="widget-heading">'+ datapermohonan[i].nama_pelanggan +'</div>' +
                                 '<div class="widget-subheading opacity-7">'+ datapermohonan[i].no_ktp +'</div>' +
                           '</div>' +
                        '</div>' +
                     '</div>' +
                  '</td>' +
               '<td class="text-center">'+ datapermohonan[i].alamat +'</td>' +
               '<td class="text-center">' +     
                  '<div class="badge badge-warning">BELUM TERVIRIFIKASI</div>' +
                  '</td>' +
               '<td class="text-center">' +
                  '<button type="button" class="btn btn-primary" onclick="GetDetail('+ datapermohonan[i].nomor_kwh +')" data-toggle="modal" data-target="#detail">Detail</button>' +
               '</td>' +
               '</tr>';
               
               }else if (datapermohonan[i].status == "400") {
                  rowpasang += '<tr>'+
                  '<td class="text-center text-muted">#'+ datapermohonan[i].nomor_kwh +'</td>'+
                  '<td>'+
                     '<div class="widget-content p-0">' +
                        '<div class="widget-content-wrapper">' +
                           '<div class="widget-content-left flex2">' +
                                 '<div class="widget-heading">'+ datapermohonan[i].nama_pelanggan +'</div>' +
                                 '<div class="widget-subheading opacity-7">'+ datapermohonan[i].no_ktp +'</div>' +
                           '</div>' +
                        '</div>' +
                     '</div>' +
                  '</td>' +
               '<td class="text-center">'+ datapermohonan[i].alamat +'</td>' +
               '<td class="text-center">' +     
                  '<div class="badge badge-warning">BELUM TERPASANG</div>' +
                  '</td>' +
               '<td class="text-center">' +
                  '<button type="button" class="btn btn-primary" onclick="GetDetail('+ datapermohonan[i].nomor_kwh +')" data-toggle="modal" data-target="#detail">Detail</button>' +
               '</td>' +
               '</tr>';
               }           
               else if (datapermohonan[i].status == "399") {
                  row += '<tr>'+
                  '<td class="text-center text-muted">#'+ datapermohonan[i].nomor_kwh +'</td>'+
                  '<td>'+
                     '<div class="widget-content p-0">' +
                        '<div class="widget-content-wrapper">' +
                           '<div class="widget-content-left flex2">' +
                                 '<div class="widget-heading">'+ datapermohonan[i].nama_pelanggan +'</div>' +
                                 '<div class="widget-subheading opacity-7">'+ datapermohonan[i].no_ktp +'</div>' +
                           '</div>' +
                        '</div>' +
                     '</div>' +
                  '</td>' +
               '<td class="text-center">'+ datapermohonan[i].alamat +'</td>' +
               '<td class="text-center">' +     
                  '<div class="badge badge-warning">BELUM TERVERIFIKASI </div>' +
                  '</td>' +
               '<td class="text-center">' +
                  '<button type="button" class="btn btn-primary" onclick="GetDetail('+ datapermohonan[i].nomor_kwh +')" data-toggle="modal" data-target="#detail">Detail</button>' +
               '</td>' +
               '</tr>';
               }           
            }
            $('#tbody-verifikasi').empty();
            $('#tbody-verifikasiputussementara').empty();
            $('#tbody-verifikasibayar').empty();
            $('#tbody-verifikasipasang').empty();
            $('#tbody-verifikasi').append(rowverifikasi);
            $('#tbody-verifikasibayar').append(rowbayar);
            $('#tbody-verifikasipasang').append(rowpasang);
            $('#tbody-verifikasiputussementara').append(row);
         }
      });  
   }
</script>