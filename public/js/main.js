(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);

function urlLink() {
	let urlLink = "http://127.0.0.1:8000/"
	return urlLink
  }
  let url = urlLink()


  $('#out').click(function () {
	Cookies.remove('usertype');
	Cookies.remove('userid');
	window.location.replace('/login');
});

$(document).ready(function () {

    // if (Cookies.get('usertype') == null) {
    //     // window.location.replace('index.html');
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Please login first.',
    //         footer: '<a href="../login/index.html">Login here.</a>',
    //         timer: 2000
    //       })
    //       setTimeout(() => {
    //         location.replace('../login/index.html');
    //       }, 2000);      

    // }
    //  if(Cookies.get('usertype') != "Cashier"){
    //     if(Cookies.get('usertype') === "Admin"){
    //         location.replace('../admin/index.html');
    //     }else if(Cookies.get('usertype') === "In-charge"){
    //         location.replace('../incharge/index.html');
    //     }
    // }

});   