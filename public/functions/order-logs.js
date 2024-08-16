$.ajax({
    url: "/api/admin/order-logs",
    type: 'GET',
    dataType: 'json',
    success: function(result){
      for(var x=0; x<result.length; x++){
        var dataTable = $('#example').DataTable();
        dataTable.clear();
    
        for (var x = 0; x < result.length; x++) {
          var rowData = [
            result[x].order_id,
            result[x].customer_name,
            result[x].order_date_time,
            result[x].name,
            result[x].quantity,
            result[x].totalprice
          ];
          dataTable.row.add(rowData);
        }        
        dataTable.draw();
      }
  
    }
  })
  