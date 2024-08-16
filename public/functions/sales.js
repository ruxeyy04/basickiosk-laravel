$.ajax({
    url: "/api/admin/get-sales",
    type: 'GET',
    dataType: 'json',
    success: function(result){
      for(var x=0; x<result.length; x++){
        var dataTable = $('#example').DataTable();
        dataTable.clear();
    
        for (var x = 0; x < result.length; x++) {
          var rowData = [
            result[x].serial_id,
            result[x].name,
            result[x].manufacturer,
            result[x].price,
            result[x].itemsold,
            result[x].totalsale
          ];
          dataTable.row.add(rowData);
        }        
        dataTable.draw();
      }
  
    }
  })

  $.ajax({
    url: "/api/admin/get-sales",
    type: 'GET',
    dataType: 'json',
    success: function(result){
      for(var x=0; x<result.length; x++){
        var dataTable = $('#inventory').DataTable();
        dataTable.clear();
    
        for (var x = 0; x < result.length; x++) {
          var rowData = [
            result[x].serial_id,
            result[x].name,
            result[x].manufacturer,
            result[x].manufactured_date,
            result[x].exp_date,
            result[x].price,
            result[x].quantity,
            result[x].itemsold,
            result[x].totalsale,
            result[x].status
          ];
          dataTable.row.add(rowData);
        }        
        dataTable.draw();
      }
  
    }
  })
  