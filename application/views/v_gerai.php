<?php $this->load->view('template/header');?>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div>Gerai
				<div class="page-title-subheading">
               Pendataaan Gerai
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-header">
               <h6>Data Gerai</h6>
            </div>
            <div class="card-body">
               <table class="table DataTable">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nama Gerai</th>
                        <th>Penanggung Jawab</th>
                        <th>Alamat</th>
                        <th>Detail</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($gerai as $g){?>
                     <tr>
                        <td><?= $g->id_gerai?></td>
                        <td><?= $g->nama_gerai?></td>
                        <td><?= $g->nama_penanggungjawab?></td>
                        <td><?= $g->alamat_gerai?></td>
                        <td><button type="button" class="btn btn-info" onclick="detailgerai(<?= $g->id_gerai?>)" data-toggle="modal" data-target="#modal-detailgerai">Detail </button>
                        </td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $this->load->view('template/footer');?>

<div class="modal fade" id="modal-detailgerai" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Detail Gerai</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
         </div>
         <div class="modal-body" id="detail-data">
           
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="cetakrekon()" class="btn btn-primary">Cetak Rekonsiliasi</button>
         </div>
      </div>
   </div>
</div>

<script>
   function detailgerai(idgerai) {
      $.ajax({
         type: 'GET',
         url: '<?= base_url('Gerai/getdetailgerai/')?>'+ idgerai,
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
   function cetakrekon() {
     var id = $('#idgerai').val();
     window.location.href = "<?= base_url('Gerai/cetakrekon/')?>"+ id;
   }
</script>