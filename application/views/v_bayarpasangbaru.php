<?php $this->load->view('template/header.php');?>
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <h4 class="text-primary">Bayar Pemasangan Baru</h4>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-xl-4">
            <div class="card">
            <div class="card-header"><h6 class="text-primary">Masukan Kode Pembayaran</h6></div>
               <div class="card-body">
                  <div class="form-row">
                     <div class="col-12">
                        <label for="">Kode Pembayaran</label>
                        <input type="text" id="input-code" class="form-control">
                     </div>
                     <div class="col-12 mt-3">
                        <button onclick="SearchCode()" id="btn-search" class="btn btn-primary btn-block">Proses Kode</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-8 mt-2">
            <div class="card"> 
               <div class="card-header">
                  <h5 class="text-primary">Data Calon Pelanggan</h5>
               </div>
               <div class="card-body" style="font-size:21px">
                  <div class="form-row">
                     <div class="col-12">
                        <div class="loading-image loading-modal d-none text-center">
                           <img src="<?= base_url('assets/images/loading-img.gif')?>" alt="">
                        </div>
                     </div>
                  </div> 
                  <div id="data-pembayaran"> 
                  
                  </div>                
               </div>
            </div> 
         </div>
      </div>
   </div>
<?php $this->load->view('template/footer.php');?>

<script>
   $(document).ready(function () {
      $('#input-code').keydown(function () {
         $('#btn-search').prop('disabled', false);
         $('#data-pembayaran').empty();
      })
   });

   function SearchCode() {
      var code = $('#input-code').val();
      $('#btn-search').prop('disabled', true);
      $.ajax({
         type: 'GET',
            async : false,
            url: '<?= base_url('Pembayaran/caripembayaranpasangbaru/')?>'+ code,
            beforeSend: function(){
               $('.loading-image').show();
               // $('#tablesec').hide();
            },
            complete: function(){
               $('.loading-image').hide();
            },
            success: function(datapermohonan){
               $('#data-pembayaran').append(datapermohonan);
            }
      });
   }

   function ProsesPayment() {
      var code = $('#input-code').val();
      $('#btn-search').prop('disabled', true);
      $.ajax({
         type: 'GET',
         async : false,
         url: '<?= base_url('Pembayaran/prosespembayaranpasangbaru/')?>'+ code,
         beforeSend: function(){
            $('.loading-image').show();
            // $('#tablesec').hide();
         },
         complete: function(){
            $('.loading-image').hide();
         },
         success: function(datapermohonan){
            Swal.fire(
            'Success',
            'Pembayaran Berhasil DiProsses',
            'success'
            );
         }
      });
   }
</script>