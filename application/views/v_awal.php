<?php 
		$this->load->view('header');
?>

<body>
	<header>
		<nav class="top-nav">
			<div class="container-fluid">
				<div class="nav-space">
					<!-- <img src="<?php base_url()?>image/cimb.png" alt="cimb"> -->
					<span class="title-page">Pembayaran PLN</span>
					<div class="nav-item">
						<ul class="nav-ul">
							<li><span>Welcome : admin</span></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<section>
		<div class="main">
			<?php $this->load->view('template/side_nav')?>
			<!--  -->
			<div class="box-content">
				<div class="top-bar">
					<span class="form-title">Pelanggan</span>
				</div>
				<!-- SEARCH BOX -->
				<div class="form-box">

					<table class="form-item">
						<tr>
							<td>
								No KWh
							</td>
							<td>
							
							</td>
						</tr>
						<tr>
							<td>
								Nama Pelanggan
							</td>
							<td>
							
							</td>
						</tr>
						<tr>
							<td>
								Alamat
							</td>
							<td>
							
							</td>
						</tr>
						<tr>
							<td>
								
							</td>
							<td>
								<input id="namaperangkat" type="text" name="namaperangkat">
							</td>
						</tr>
						<tr>
							<td>
								PIC
							</td>
							<td>
								<input id="pic" type="text" name="pic">
							</td>
						</tr>
						<tr>
							<td>
								<button id="search" value="Search" name="Search" class="btn-search">Search</button>
							</td>
						</tr>
					</table>

				</div>

				<!-- Table in here -->
				<div class="table-box">
					<table class="DataTable">
						<thead>
							<tr>
								<td>No</td>
								<td>nomor KWh</td>
								<td>Nama Pelanggan</td>
								<td>Alamat</td>
								<td>Tarif</td>
							</tr>
						</thead>
						<tbody>
						<?php 
							$no = 1;
							foreach($pelanggan as $p){ 
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $p->nomor_kwh?></td>
								<td><?php echo $p->nama_pelanggan?></td>
								<td><?php echo $p->alamat ?></td>	
								<td><?php echo $p->id_tarif ?></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</section>
	<?php $this->load->view('template/footer.php'); ?>
