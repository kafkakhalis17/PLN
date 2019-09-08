</div>
</section>
</body>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ShowData.js"></script>
<script>
   function Delete(table,id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            window.location.href = '<?= base_url();?>'+table+'/Delete/'+id;
         //  swal("Poof! Your imaginary file has been deleted!", {
         //    icon: "success",
         //  });
        } else {
          swal("Your imaginary file is safe!");
        }
    });
}
</script>
</html>