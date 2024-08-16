var userid;
$(function(){
    userid = Cookies.get('userid');
    // console.log('user id '+userid)
    $.ajax({
        type: "GET",
        url: "/api/profile/info",
        data: {userid:userid},
        dataType: "json",
        success: function (response) {
            // console.log(response)
            var usr = response[0].username;
            var pwd = response[0].password;

            $('#user').val(usr);
        }
    });
});
$('#updateacc').click(function () { 
    userid = Cookies.get('userid');
    var user = $('#user').val();    
    var pass = $('#pass').val();    

    $.ajax({
        type: "POST",
        url: "api/profile/info",
        data: {userid:userid, user:user, pass:pass},
        dataType: "json",
        success: function (response1) {
            console.log(response1)
            if(response1.messageType == "success"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response1.message,
                    showConfirmButton: true,
                    timer: 1500
                  })
                  setTimeout(() => {
                    location.reload();
                  }, 1500);    
            }
        }
    });
});