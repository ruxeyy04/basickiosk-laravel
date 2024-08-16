$("#addincharge").click(function () {
  var un = $("#username").val();
  var pass = $("#password").val();

  $.ajax({
    type: "POST",
    url: "/api/admin/add-incharge",
    data: { user: un, pass: pass },
    dataType: "json",
    success: function (response) {
      if (response.messageType == "success") {
        Swal.fire({
          position: "center",
          icon: "success",
          title: response.message,
          showConfirmButton: true,
          timer: 1500,
        });
        setTimeout(function () {
          location.reload();
        }, 1500);
      }
    },
  });
});
$("#addadmin").click(function () {
  var un = $("#username").val();
  var pass = $("#password").val();

  $.ajax({
    type: "POST",
    url: "/api/admin/add-admin",
    data: { user: un, pass: pass },
    dataType: "json",
    success: function (response) {
      if (response.messageType == "success") {
        Swal.fire({
          position: "center",
          icon: "success",
          title: response.message,
          showConfirmButton: true,
          timer: 1500,
        });
        setTimeout(function () {
          location.reload();
        }, 1500);
      }
    },
  });
});

$.ajax({
  url: "/api/admin/get-incharge",
  type: 'GET',
  dataType: 'json',
  success: function(result){
    for(var x=0; x<result.length; x++){
      var dataTable = $('#example').DataTable();
      dataTable.clear();
  
      for (var x = 0; x < result.length; x++) {
        var rowData = [
          result[x].userid,
          result[x].username,
          '***********',
          result[x].usertype,
          '<div class="btn-group">' +
          '<button class="btn btn-danger delete" title="Delete book" data-id="' + result[x].userid + '">Delete</button>' +
          '</div>'
        ];
        dataTable.row.add(rowData);
      }        
      dataTable.draw();
    }
    // delete
    $(document).on('click', '.delete', function () { 
      var id = $(this).data('id');
      console.log(id)

      Swal.fire({
        title: 'Are you sure to delete this In-charge?',
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
          url: '/api/admin/delete-incharge',
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
// view admin
$.ajax({
  url: "/api/admin/get-admin",
  type: 'GET',
  dataType: 'json',
  success: function(result){
    for(var x=0; x<result.length; x++){
      var dataTable = $('#viewadmin').DataTable();
      dataTable.clear();
  
      for (var x = 0; x < result.length; x++) {
        var rowData = [
          result[x].userid,
          result[x].username,
          '***********',
          result[x].usertype,
          '<div class="btn-group">' +
          '<button class="btn btn-danger delete" title="Delete book" data-id="' + result[x].userid + '">Delete</button>' +
          '</div>'
        ];
        dataTable.row.add(rowData);
      }        
      dataTable.draw();
    }
    // delete
    $(document).on('click', '.delete', function () { 
      var id = $(this).data('id');
      console.log(id)

      Swal.fire({
        title: 'Are you sure to delete this Incharge?',
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
          url: '/api/admin/delete-admin',
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
