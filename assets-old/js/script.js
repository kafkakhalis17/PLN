$(document).ready(function(){
  $(".DataTable").DataTable();
});

        // MODAl
        btn = document.getElementById('MyBut');
        // Get the <span> element that closes the modal
       
       
        // // When the user clicks the button, open the modal 
        function ShowModal() {
            document.getElementsByClassName('modal')[0].style.display = "block";
        }
       
        function ShowModalUpdate(id) { 
          
           document.getElementById('update' + id).style.display = "block";
    
       }
       function ShowModalAssign(id) { 
          
        document.getElementById('assign' + id).style.display = "block";
    }


       function CloseModal() {
        var x = document.getElementsByClassName("modal");
        var i;
        for (i = 0; i < x.length; i++) {
            x[i].style.display = 'none';   
        }

    }

    //  DELETE Menggunakan Sweetalert id diminta dari sesuai id pada Table

    function Deleteperangkat (id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
            window.location.href('Deleteperangkat'+id);
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });
    }


