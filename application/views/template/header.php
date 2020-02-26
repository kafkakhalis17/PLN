 <!DOCTYPE html >
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Aplikasi PLN UKK</title>
	<script src="<?= base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
	<script src="<?= base_url('assets/vendor/popper.min.js');?>"></script>
	<!-- <script src="<?=base_url()?>assets/vendor/bootstrap/bootstrap.min.js"></script> -->
	<script src="<?=base_url()?>assets/vendor/datatables.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/chosen-js/chosen.jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/sweetalert/sweetalert2.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/select2.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/fontawesome/js/all.js"></script>

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
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script> -->
	<!-- <script>
		function kFormatter(num) {
			return Math.abs(num) > 999 ? Math.sign(num) * ((Math.abs(num) / 1000).toFixed(1)) + 'k' : Math.sign(num) *
				Math.abs(num)
		}

		function getUrlParameter(sParam) {
			var sPageURL = window.location.search.substring(1),
				sURLVariables = sPageURL.split('&'),
				sParameterName,
				i;

			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');

				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
				}
			}
		};

		function getRandomColor() {
			var letters = '0123456789ABCDEF';
			var color = '#';
			for (var i = 0; i < 6; i++) {
				color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
		}
		setInterval(function () {
			var date = new Date();
			$('#clock-wrapper').html(
				date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
			);
		}, 500);

	</script> -->
	<!-- <script>
	$(document).ready(function () {
		var url = document.URL;
		activedNavLink(url);
		activedNavTopLink(url);

		function activedNavLink(url) {
			console.log("TES");
			
			var href = $('.link-nav').attr('href');
			// console.log(href);
			
			$(".link-nav[href='"+url+"']").addClass('mm-active');
			$(".link-nav[href='"+url+"']").parents(".nav-parent").addClass('mm-active');
		}

		function activedNavTopLink(url) {
			console.log("TES2");
			$(".nav-link[href='"+url+"']").parent(".nav-item").addClass('active');
			$(".nav-link[href='"+url+"']").append('<span class="sr-only">(current)</span>');
			//  $(".nav-link[href='"+url+"']").parents(".nav-parent").addClass('mm-active');
		}
	});
	</script> -->
</head>

<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
		<div class="app-header header-shadow bg-light header-text-dark">
			<div class="app-header__logo">
				<div class="logo-src">
					<div class="logo-name">PLN Mangement</div>
				</div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
							data-class="closed-sidebar">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<div class="app-header__mobile-menu">
				<div>
					<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
			<div class="app-header__menu">
				<span>
					<button type="button"
						class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
						<span class="btn-icon-wrapper">
							<i class="fa fa-ellipsis-v fa-w-6"></i>
						</span>
					</button>
				</span>
			</div>
			<div class="app-header__content">
				<div class="app-header-left">
					<div class="search-wrapper">
						<div class="input-holder">
							<input type="text" class="search-input" placeholder="Type to search">
							<button class="search-icon"><span></span></button>
						</div>
						<button class="close"></button>
					</div>
					<ul class="header-menu nav">
						<li class="nav-item">
							<a href="javascript:void(0);" class="nav-link">
								<i class="nav-link-icon fa fa-database"> </i>
								Statistics
							</a>
						</li>
						<li class="btn-group nav-item">
							<a href="javascript:void(0);" class="nav-link">
								<i class="nav-link-icon fa fa-edit"></i>
								Projects
							</a>
						</li>
						<li class="dropdown nav-item">
							<a href="javascript:void(0);" class="nav-link">
								<i class="nav-link-icon fa fa-cog"></i>
								Settings
							</a>
						</li>
					</ul>
				</div>
				<div class="app-header-right">
					<div class="header-btn-lg pr-0">
						<div class="widget-content p-0">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="btn-group">
										<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
											class="p-0 btn">
											<img width="42" class="rounded-circle" src="assets/images/user.png"
												alt="">
											<i class="fa fa-angle-down ml-2 opacity-8"></i>
										</a>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
											<button type="button" tabindex="0" class="dropdown-item">User
												Account</button>
											<button type="button" tabindex="0" class="dropdown-item">Settings</button>
											<h6 tabindex="-1" class="dropdown-header">Header</h6>
											<button type="button" tabindex="0" class="dropdown-item">Actions</button>
											<div tabindex="-1" class="dropdown-divider"></div>
											<button type="button" onclick="location.href='<?= base_url('Admin/logout');?>'" tabindex="0" class="dropdown-item">Logout</button>
										</div>
									</div>
								</div>
								<div class="widget-content-left  ml-3 header-user-info">
									<div class="widget-heading">
										<?= $this->session->userdata('nama');?>
									</div>
									<div class="widget-subheading">
										<?= $this->session->userdata('hak');?>
									</div>
								</div>
								<div class="widget-content-right header-user-info ml-3">
									<button type="button"
										class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
										<i class="fa fa-calendar"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="app-main">
			<div class="app-sidebar sidebar-shadow">
				<div class="app-header__logo">
					<div class="logo-src"></div>
					<div class="header__pane ml-auto">
						<div>
							<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
								data-class="closed-sidebar">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
				</div>
				<div class="app-header__mobile-menu">
					<div>
						<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
				<div class="app-header__menu">
					<span>
						<button type="button"
							class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
							<span class="btn-icon-wrapper">
								<i class="fa fa-ellipsis-v fa-w-6"></i>
							</span>
						</button>
					</span>
				</div>
				<div class="scrollbar-sidebar">
					<div class="app-sidebar__inner">
						<ul class="vertical-nav-menu">
							<li class="app-sidebar__heading">Dashboards</li>
							<li>
								<a href="<?= base_url('Dashboard');?>" >
									<i class="metismenu-icon pe-7s-rocket"></i>
									Dashboard Status
								</a>
							</li>
							<?php if ( $this->session->userdata('id_level') == '2' ||  $this->session->userdata('id_level') == '5') {?>
							<li class="app-sidebar__heading">Verigikasi Data</li>
							<li class="nav-parent">
								<a href="#">
									<i class="metismenu-icon pe-7s-culture	"></i>
									Gerai
									<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
								</a>
								<ul>
									<li>
										<a class="link-nav" href="<?= base_url('Gerai/permintaan');?>">
											<i class="metismenu-icon">
											</i>Permintaan
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a href="#">
									<i class="metismenu-icon pe-7s-folder"></i>
									Pelanggan
									<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
								</a>
								<ul>
									<li>
										<a class="link-nav" href="<?= base_url('VerifikasiData/verifikasipasangbaru');?>">
											<i class="metismenu-icon"></i>
											Verifikasi Pasang baru
										</a>
									</li>
									<li>
										<a class="link-nav" href="<?= base_url('Pelanggan/putussambungan');?>">
											<i class="metismenu-icon"></i>
											Verifikasi Pemutusan
										</a>
									</li>
								</ul>
							</li>
							<li class="app-sidebar__heading">Pendataan</li>
							<li class="nav-parent">
								<a href="#">
									<i class="metismenu-icon pe-7s-folder"></i>
									Pelanggan
									<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
								</a>
								<ul>
									<li>
										<a class="link-nav" href="<?= base_url('Pelanggan');?>">
											<i class="metismenu-icon"></i>
											Pelanggan
										</a>
									</li>
									<li>
										<a class="link-nav" href="<?= base_url('Penggunaan');?>">
											<i class="metismenu-icon"></i>
											Penggunaan
										</a>
									</li>
									<li>
										<a class="link-nav" href="<?= base_url('Tagihan');?>">
											<i class="metismenu-icon"></i>
											Tagihan dan Status
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a href="#">
									<i class="metismenu-icon pe-7s-culture	"></i>
									Gerai
									<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
								</a>
								<ul>
									<li>
										<a href="<?= base_url('Gerai')?>">
											<i class="metismenu-icon">
											</i>Data Gerai
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="<?= base_url('tarif')?>">
									<i class="metismenu-icon pe-7s-display2"></i>
									Tarif
								</a>
							</li>
							<li>
								<a href="<?= base_url('Report')?>">
									<i class="metismenu-icon pe-7s-news-paper"></i>
									Cetak Report
								</a>
							</li>	
							<?php }?>
							<?php if ( $this->session->userdata('id_level') == '6' ||  $this->session->userdata('id_level') == '3') {?>
							<li class="app-sidebar__heading">Pembayaran</li>
							<li>
								<a href="#">
									<i class="metismenu-icon pe-7s-culture	"></i>
										Pelanggan
									<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
								</a>
								<ul>
									<li>
										<a class="link-nav" href="<?= base_url('Pembayaran');?>">
											<i class="metismenu-icon"></i>
											Pembayaran Bulanan
										</a>
									</li>
									<li>
										<a class="link-nav" href="<?= base_url('Pembayaran/bayarpemasangan');?>">
											<i class="metismenu-icon"></i>
											Pembayaran Pasang
										</a>
									</li>
								</ul>
							</li>
							<?php }	?>			
						</ul>
					</div>
				</div>
			</div>
			<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<!-- <script src="<?=base_url()?>assets/vendor/architect-ui/assets/scripts/main.js"></script> -->
			<div class="app-main__outer">
            <div class="app-main__inner">
