//add prod
$('#add').submit(function (e) { 
    e.preventDefault()
    let formdata = new FormData(this)
    $.ajax({
        type: "POST",
        url: "/api/incharge/products/add",
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
                    location.reload();
                  }, 1500);     
            }
        }
    });
});

//view products
$.ajax({
    url: "/api/incharge/products",
    type: 'GET',
    dataType: 'json',
    success: function(result){

      for(var x=0; x<result.length; x++){
        var dataTable = $('#example').DataTable();
        dataTable.clear();
    
       for (var x = 0; x < result.length; x++) {
  var rowData = [
    result[x].serial_id,
    (result[x].image ? `<img src="../prod-img/${result[x].image}" class="img-thumbnail" width="80px"/>` : `<img src="../prod-img/default.jpg" class="img-thumbnail" width="80px"/>`) + result[x].name,
    result[x].manufacturer,
    result[x].manufactured_date,
    result[x].exp_date,
    result[x].price,
    result[x].quantity,
    result[x].status,
    '<div class="btn-group">' +
      '<button class="btn btn-info edit" data-id="' + result[x].serial_id + '">Edit</button>' +
    '</div>',
    '<div class="btn-group">' +
      '<button class="btn btn-danger delete" data-id="' + result[x].serial_id + '">Delete</button>' +
    '</div>'
  ];
  dataTable.row.add(rowData);
}
    
        dataTable.draw();
      }

      // edit
      $(document).on('click', '.edit', function () { 
        var id = $(this).data('id'); 
        console.log(id)
        window.location.href = 'prodedit?serial_id=' + id;
      });

      // delete
      $(document).on('click', '.delete', function () { 
        var id = $(this).data('id');
        console.log(id)
  
        Swal.fire({
          title: 'Are you sure to delete this product?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
            type: 'POST',
            url: '/api/incharge/products/delete',
            data: { delete: id }, 
            success: function(response1) {
              if(response1.messageType === "success"){
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
              }else{
                alert(response1)
              }
              },
              error: function(xhr, status, error) {
                console.log(xhr.responseText); 
              }
            });
          }
        })
      });
  
    }
  })