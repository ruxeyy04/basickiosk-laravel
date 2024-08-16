$(document).ready(function () {
    console.log(Cookies.get('usertype'));
    console.log(Cookies.get('userid'));

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

    }
     if(Cookies.get('usertype') != "Cashier"){
        if(Cookies.get('usertype') === "Admin"){
            location.replace('/admin');
        }else if(Cookies.get('usertype') === "In-charge"){
            location.replace('/incharge');
        }
    }

   
});   