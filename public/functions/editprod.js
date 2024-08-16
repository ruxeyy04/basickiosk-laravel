$(document).ready(function() {
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var serialId = urlParams.get('serial_id');
    console.log(serialId); 

    $.ajax({
        type: "GET",
        url: "/api/incharge/products/" + serialId,
        data: {serialId:serialId},
        dataType: "json",
        success: function (response) {
            console.log(response)
            var serial = response[0].serial_id;
            var name = response[0].name;
            var manufacturer = response[0].manufacturer;
            var mandate = response[0].manufactured_date;
            var expdate = response[0].exp_date;
            var price = response[0].price;
            var quantity = response[0].quantity;
            var status = response[0].status;
            var image = response[0].image;
            $('#serial').val(serial);
            $('#name').val(name);
            $('#manufacturer').val(manufacturer);
            $('#mandate').val(mandate);
            $('#expdate').val(expdate);
            $('#price').val(price);
            $('#quantity').val(quantity);
            $('#status').val(status);
            $('#image').attr('src', '/prod-img/'+image)
        }
    });


    $('#update').submit(function (e) { 
        e.preventDefault()
    let formdata = new FormData(this)
      $.ajax({
          type: "POST",
          url: "/api/incharge/products/update",
          data: formdata,
          dataType: "json",
          processData: false,
          contentType: false,
          success: function (response) {
              if(response.messageType == "success"){
                  Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: response.message,
                      showConfirmButton: true,
                      timer: 1500
                    })
                    setTimeout(() => {
                      location.replace('viewproduct');
                    }, 1500);     
              }
          }
      });
    });
  });
  