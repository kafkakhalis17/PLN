<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Aplikasi PLN UKK</title>
	<script src="<?= base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
	<script src="<?= base_url('assets/vendor/popper.min.js');?>"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/datatables.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/chosen-js/chosen.jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/sweetalert/sweetalert2.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/select2.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/fontawesome/js/all.js"></script>
	<!-- <script src="<?=base_url()?>assets/vendor/architect-ui/assets/scripts/main.js"></script> -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/css/favicon.ico">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	<!-- <link rel="stylesheet" href="<?=base_url()?>assets/css/mainpro.css"> -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/select2.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/architect-ui/main.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/sweetalert/sweetalert2.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/DataTables-1.10.18/css/datatables.bootstrap4.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/datatables.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/chosen-js/chosen.min.css">
</head>
<body>
   
<header>
   <nav class="navbar navbar-expand-lg navbar-light nav-bg">
      <a class="navbar-brand" href="<?= base_url('Dashboard/tamu');?>">
         <img src="<?= base_url()?>assets/images/Logo_PLN.png" alt="" width="42px">   
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('Dashboard/tamu');?>">HOME<span class="sr-only">(current)</span></a>
            </li> 
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('LayananPelanggan')?>">PELANGGAN</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('LayananGerai')?>">GERAI</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Dropdown
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
         </ul>
         <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
         </form>
      </div>
   </nav>
</header>