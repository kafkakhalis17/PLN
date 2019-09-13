<?php 
		$this->load->view('template/header');
?>
 <div class="page" id="Dashboard">
      <span class="page-title">Dashboard</span>
		<div class="box-container">
        <div class="box box-grid" onclick="window.location.href = 'Penggunaan'">
            <div class="box-icon">
                <img src="assets/css/man-user.svg" alt="">
            </div>
            <div class="box-title">
                <span>Penggunaan</span>
            </div>
				
        </div>
      </div>
   </div>
<?php
 $this->load->view('template/footer.php'); 
?>
