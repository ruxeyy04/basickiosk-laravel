$(document).ready(function () {
    if (Cookies.get("usertype")) {
        let usertype = Cookies.get("usertype")
        if (usertype == "Admin") {
          location.replace('/admin')
        } else if(usertype == "In-charge") {
          location.replace('/incharge')
        } else {
          location.replace('/')
        }
    }

    $("#signin").click(function () {
        var usr = $("#username").val();
        var pwd = $("#password").val();

        $.ajax({
            type: "POST",
            url: "api/login",
            data: { user: usr, password: pwd },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.length > 0) {
                    Cookies.set("usertype", data[0].usertype);
                    Cookies.set("userid", data[0].userid);

                    if (data[0].usertype === "Cashier") {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Login successfully",
                            showConfirmButton: true,
                            text: "Welcome Cashier",
                            timer: 1500,
                        });
                        setTimeout(() => {
                            location.replace("/");
                        }, 2000);
                    } else if (data[0].usertype === "Admin") {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Login successfully",
                            showConfirmButton: true,
                            text: "Welcome Admin",
                            timer: 1500,
                        });
                        setTimeout(() => {
                            location.replace("/admin");
                        }, 2000);
                    } else if (data[0].usertype === "In-charge") {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Login successfully",
                            showConfirmButton: true,
                            text: "Welcome In-charge",
                            timer: 1500,
                        });
                        setTimeout(() => {
                            location.replace("/incharge");
                        }, 2000);
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "You are not logged in",
                            showConfirmButton: true,
                            timer: 1500,
                        });
                        setTimeout(() => {
                            location.replace("/");
                        }, 2000);
                    }
                } else {
                    showErrorMessage("Incorrect username or password");
                }
            },
            error: function () {
                showErrorMessage("An error occurred during login");
            },
        });
        // console.log(usr + pwd)
    });

    function showErrorMessage(message) {
        // alert(message);
        Swal.fire({
            icon: "error",
            title: "Incorrect username or password",
            footer: '<a href="#">Forgot username / password?</a>',
            timer: 3000,
        });
        // setTimeout(() => {
        //     location.reload();
        // }, 1500);
    }
});
