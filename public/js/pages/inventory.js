let inv = $('#inventory').DataTable({
    ajax: {
        url: url + 'api/cashier/inventory',
        type: "GET",
        dataSrc : 'data'
    },
    columns: [
        {data: "serial"},
        {data: "name"},
        {data: "manufacturer"},
        {data: "manufactured_date"},
        {data: "exp_date"},
        {data: "price"},
        {data: "quantity"},
        {data: "totalsold"},
        {data: "totalsale"},
        {data: "status"}
    ]
})
