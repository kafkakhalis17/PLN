  <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<script src="<?= base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/bootstrap.js"></script>
	<script src="<?=base_url()?>assets/vendor/datatables.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/chosen-js/chosen.jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/sweetalert/sweetalert2.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/select2.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/fontawesome/js/all.js"></script>
	<script src="<?=base_url()?>assets/vendor/stisla/dist/js/stisla.js"></script>
	<script src="<?=base_url()?>assets/vendor/stisla/dist/js/script.js"></script>
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/css/favicon.ico">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/select2.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/stisla/dist/assets/css/style.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/stisla/dist/assets/css/components.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/stisla/dist/assets/css/skins/reverse.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/sweetalert/sweetalert2.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/DataTables-1.10.18/css/datatables.bootstrap4.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/datatables.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/chosen-js/chosen.min.css">

</head>

<body class="overflow-hidden login-body">
<?php 
    if($this->session->tempdata('appin') == true) { ?>
        <div class="login-wrapper">
            <div class="row">
                <div class="col-xl-12">
                    <!-- New Form -->
                    <div class="alert-login">
                        <ul class="list-group">
                            <?= $this->session->flashdata('Error');?>
                        </ul>
                    </div>
                    <div class="container-lg-form">
                        <span class="login-title">PLN Management System</span>
                        <div id="logo-pln-lg">
                            <img width="70px" src="<?= base_url('assets/images/Logo_PLN.png')?>" alt="">
                        </div>
                        <form class="login-form" action="<?= base_url('Admin/masuk');?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">SIGN IN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php }else {?>
        <div class="splash-screen">
            <div class="container-fluid load-screen">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="loading fadeIn">
                            <span id="bolt-logo"><i class="fas fa-bolt"></i></span>
                        </div>
                        <span class="loading-text fadeIn Loading">PLN</span>
                    </div>       
                </div>
            </div>
        </div>
        <div class="app">
            <div class="login-wrapper">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- New Form -->
                        <div class="container-lg-form">
                        
                            <span class="login-title">PLN Management System</span>
                            <div id="logo-pln-lg">
                                <img width="70px" src="<?= base_url('assets/images/Logo_PLN.png')?>" alt="">
                            </div>
                            <form class="login-form" action="<?= base_url('Admin/masuk');?>" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Username">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                        else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">SIGN IN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <?php } ?>
</body>

</html>
