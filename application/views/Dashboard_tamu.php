<?php $this->load->view('template/header_other.php');?>

<div class="container mt-4">
   <div class="row">
      <div class="col-xl-12">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="<?= base_url()?>/assets/images/FA-Menembus-Batas-75-Digital_1600X447.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img src="<?= base_url()?>/assets/images/Banner-TMP.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img src="<?= base_url()?>/assets/images/web-banner-hak-2019-1.jpeg" class="d-block w-100" alt="...">
            </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>
      </div>
   </div>
</div>

<?php $this->load->view('template/footer_other.php');?>
