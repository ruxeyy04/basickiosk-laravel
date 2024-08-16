$(document).ready(function () {
    if (Cookies.get('usertype') == null) {
        Swal.fire({
            icon: 'error',
            title: 'Please login first.',
            footer: '<a href="/login">Login here.</a>',
            timer: 2000
          })
          setTimeout(() => {
            location.replace('/login');
          }, 2000);    

    }else if(Cookies.get('usertype') != "In-charge"){
        if(Cookies.get('usertype') === "Cashier"){
            location.replace('/');

        }else if(Cookies.get('usertype') === "Admin"){
            location.replace('/admin');
        }    
    }
    console.log(Cookies.get('usertype'));
    console.log(Cookies.get('userid'));

    $('#out').click(function () {
        Cookies.remove('usertype');
        Cookies.remove('userid');
        window.location.replace('/login');
    });
    
});