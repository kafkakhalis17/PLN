				<!-- footer  -->
				</div> 
			</div>
		</div>
	</div>
</section>
<script src="<?=base_url('assets/vendor/architect-ui/assets/scripts/main.js');?>"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ShowData.js"></script>

</body>

<script>
	function Delete(table, id) {
		swal.fire({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this Data!",
				type:"warning",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			})
			.then((willDelete) => {
				if (willDelete.value) {
					window.location.href = '<?= base_url();?>' + table + '/Delete/' + id;
					//  swal("Poof! Your imaginary file has been deleted!", {
					//    icon: "success",
					//  });
				} else {
					swal.fire({
						title :'Cancelled',
						text :'Your imaginary file is safe :)',
						type :'error'
					});
				}
			});
	}

</script>



</html>
