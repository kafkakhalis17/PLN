<div class="side-nav">
	<ul id="myUL">
	<li class="li-item"><span class="caret">Assets List</span>
			<ul class="nested">
				<li class="li-item"><a href="<?php echo base_url().'main/FormPerangkat'?>">New Assets</a></li>
				<li class="li-item"><a href="<?php echo base_url().'main/index'?>">List of Assets</a></li>
				<li class="li-item"><a href="<?php echo base_url().'main/FormATM'?>">List of ATM</a></li>
			</ul>
		</li>
		<li class="li-item"><span class="caret">Assets Location</span>
			<ul class="nested">
				<li class="li-item"><a href="<?php echo base_url('region')?>">Region</a></li>
				<li class="li-item"><a href="<?php echo base_url('vendor')?>">Vendor</a></li>
				<li class="li-item"><a href="<?php echo base_url('branch')?>">Branch</a></li>
			</ul>
		</li>
		
		
		<li class="li-item"><span class="caret">Cash Information</span>
			<ul class="nested" >
				<li class="link-nav">Admin Activity ATM</li>
				<li class="link-nav">Admin Activity CDM</li>
				<li class="link-nav">All Terminals</li>
				<li class="link-nav">All Terminals</li>
				<li class="link-nav">All Terminals</li>
				<li class="link-nav">Begining cash Less</li>
				<li class="link-nav">Pengisian ATM</li>
				<li class="link-nav">Remaining Bills</li>
				<li class="link-nav">Remaining Bills</li>
				<li class="link-nav">Remaining Bills</li>
				<li class="link-nav">Remaining Cash All ATM</li>
				<li class="link-nav">Saldo CDM</li>
				<li class="link-nav">Saldo CRM</li>
			</ul>
		</li>
		<li class="li-item"><span class="caret">Assets Dashboard</span>
			<ul class="nested">
				<li class="li-item"></li>
			</ul>
		</li>
		<li class="li-item"><span class="caret">Cash Simulation</span>
			<ul class="nested">
				<li class="li-item"></li>
			</ul>
		</li>
		<li class="li-item"><span class="caret">Cash Configuration</span>
			<ul class="nested">
				<li class="li-item">Terminal Sets</li>
				<li class="li-item">Privilege</li>
				<li class="li-item"><span class="caret">Cash Management</span>
					<ul class="nested">
						<li class="li-item">Form Management</li>
						<li class="li-item">Money limit</li>
						<li class="li-item">Officer Management</li>
						<li class="li-item">Status Management</li>
						<li class="li-item">User Group</li>
					</ul>
				</li>
				<li class="li-item">Infrastructure</li>
			</ul>
		</li>
		<li class="li-item"><span class="caret">Cash Report</span>
			<ul class="nested">
				<li class="li-item"></li>
			</ul>
		</li>
		<li class="li-item"><span class="caret">Cash Logout</span>
			<ul class="nested">
				<li class="li-item"></li>
			</ul>
		</li>
	</ul>
</div>

<script>
	var toggler = document.getElementsByClassName("caret");
		var i;

		for (i = 0; i < toggler.length; i++) {
			toggler[i].addEventListener("click", function () {
				this.parentElement.querySelector(".nested").classList.toggle("active");
				this.classList.toggle("caret-down");
			});
		}
</script>