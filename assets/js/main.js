$(document).ready(function(){
    $("#DataSiswa").DataTable();
    $(".DataTable").DataTable();
    $(".Data-Form").DataTable(
        {
            "scrollX": true
        }
    );
    $('.tahun').each(function() {

        var year = (new Date()).getFullYear();
    var current = year;
        year -= 3;
        for (var i = 0; i < 6; i++) {
          if ((year+i) == current)
            $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
          else
            $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
        }
      
      })

    // $('nav').hover(function () {
    //     $('.body').toggleClass( "body-active" );
    //     $('body').toggleClass( "overflow-hidden" );
    // });

    // if ($(window).width() > 1366){
    //     $(".container").css("width","1448");
    // }
    // else $(".container").css("width","1270");
    
    $("#caripelanggan").select2();
    $(".searchpelanggan").select2({
        width: 'resolve'
    });
    // $(".num").css("color", getRandomColor());
    
  
});



function openmodal() {
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })
}
function toggleFullScreen(elem) {
    // ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
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



// actived link 

		var weburl = document.URL;
		activedNavLink(weburl);
		activedNavTopLink(weburl);
        console.log(weburl);
        
		function activedNavLink(weburl) {
			console.log("TES");
			
			var href = $('.link-nav').attr('href');
			// console.log(href);
			
			$(".link-nav[href='"+weburl+"']").addClass('mm-active');
			$(".link-nav[href='"+weburl+"']").parents(".nav-parent").addClass('mm-active');
		}

		function activedNavTopLink(weburl) {
            console.log("TES2");
            var leng = 	$("[href='"+weburl+"']").length
            console.log(leng);
            var href = $('.nav-link').attr('href');
			console.log(href);
			$(".nav-link[href='"+weburl+"']").parent(".nav-item").addClass('active');
			$(".nav-link[href='"+weburl+"']").append('<span class="sr-only">(current)</span>');
			$(".nav-link[href='"+weburl+"']").parents(".nav-parent").addClass('mm-active');
        }
