$(document).ready(function(){
    $("#DataSiswa").DataTable();
    $(".DataTable").DataTable();
    $(".Data-Form").DataTable(
        {
            "scrollX": true
        }
    )

    
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
   


    // if ($(window).width() > 1366){
    //     $(".container").css("width","1448");
    // }
    // else $(".container").css("width","1270");
    
    $(".select-nama").chosen();
    $(".num").css("color", getRandomColor());
    
  
});


function openmodal() {
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })
}


function SideScroll(element,direction,speed,distance,step) {
    scrollAmount = 0;
    var slideTimer = setInterval(function(){
        if(direction == 'left'){
            element.scrollLeft -= step;
        } else {
            element.scrollLeft += step;
        }
        scrollAmount += step;
        if(scrollAmount >= distance){
            window.clearInterval(slideTimer);
        }
    }, speed);
}

// CRUD SWEETALERT
