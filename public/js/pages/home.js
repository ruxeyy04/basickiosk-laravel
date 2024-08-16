var products = $("#products").DataTable({
  ajax: {
    url: url + "api/get-products",
    type: "GET",
    dataSrc: "data",
  },
  columns: [
    {
      data: "serial",
      render: function (data, type, row) {
        return `<span class="serID">${data}</span>`;
      },
    },
    { data: "image", render: function (a) {
        return `<img src="/prod-img/${a}" alt="" class="img-thumbnail" style="width: 100px">`
    }},
    {
      data: "productName",
      render: function (data) {
        return `<span class="prodName">${data}</span>`;
      },
    },
    { data: "unitPrice" },
    { data: "expiryDate" },
    {
      data: "stockQuantity",
      render: function (data, type, row) {
        return `<span class="stock">${data}</span>`;
      },
    },
    {
      data: "status",
      render: function (data, type, row) {
        return `<span class="status">${data}</span>`;
      },
    },
    {
      data: null,
      render: function (data) {
        return `<button class='btn btn-info purchaseBtn' data-serial='${data.name}' disabled>Purchase</button>`;
      },
    },
  ],
});

$("#rmvcustBtn").hide();
$("#printinvoice").hide();
function randomNumber(len) {
  var randomNumber;
  var n = "";

  for (var count = 0; count < len; count++) {
    randomNumber = Math.floor(Math.random() * 10);
    n += randomNumber.toString();
  }
  return n;
}
var inputElement = document.getElementById("quantityyy");

inputElement.addEventListener("input", function () {
  var value = parseInt(inputElement.value);

  if (value > $("#quantityyy").attr("max")) {
    inputElement.value = $("#quantityyy").attr("max");
  }
});

document.getElementById("orderid").value = randomNumber(5);
var custName;
$("#customeradd").on("click", function () {
  let fname = $("#fname").val();
  let lname = $("#lname").val();
  let custName;

  if (!fname && !lname) {
    custName = "Anoynmous";
    $("#custname").html('Customer Name: <span id="custName">Anonymous</span>');
  } else {
    custName = fname + " " + lname;
    $("#custname").html(
      'Customer Name: <span id="custName">' + fname + " " + lname + "</span>"
    );
  }
  $("#rmvcustBtn").show();
  $("#addcustBtn").hide();
  $("#addcustomer").modal("hide");

  $.ajax({
    url: url + "api/cashier/addOrder",
    type: "POST",
    data: { addOrder: $("#orderid").val(), cusName: custName },
    success: function (res) {},
    error: function (xhr, text, error) {
      console.log(xhr.responseText);
    },
  });
  $("#products tbody tr").each(function () {
    let status = $(this).find(".status").text();
    let purchaseBtn = $(this).find(".purchaseBtn");

    if (status === "Available") {
      purchaseBtn.prop("disabled", false);
    } else {
      purchaseBtn.prop("disabled", true);
    }
  });
});
$("#rmvcustBtn").on("click", function () {
  $.ajax({
    url: url + "api/cashier/delOrder",
    type: "POST",
    data: { delOrder: $("#orderid").val() },
    dataType: "json",
    success: function (res) {
      console.log(res);
    },
    error: function (xhr, stat, error) {
      console.log(xhr.responseText, stat, error);
    },
    complete: function () {
      location.reload();
    },
  });
});
var ser_id;
$(document).on("click", ".purchaseBtn", function () {
  $("#quantity").modal("show");
  $("#quantityyy").val(1);
  let prodName = $(this).closest("tr").find(".prodName").text();
  $("#prodNamee").val(prodName);
  let stocks = $(this).closest("tr").find(".stock").text();
  ser_id = $(this).closest("tr").find(".serID").text();
  $("#quantityyy").attr("max", stocks);
});

$("#purchasee").on("click", function () {
  let orderid = $("#orderid").val();
  let quantityy = parseInt($("#quantityyy").val());
  $.ajax({
    type: "POST",
    url: url + "api/cashier/purchaseAddOrder",
    data: { purchaseAddOrder: orderid, serid: ser_id, quant: quantityy },
    dataType: "json",
    success: function (res) {
      // Reload the table
      products.ajax.reload(function () {
        $("#products tbody tr").each(function () {
          let status = $(this).find(".status").text();
          let purchaseBtn = $(this).find(".purchaseBtn");

          if (status === "Available") {
            purchaseBtn.prop("disabled", false);
          } else {
            purchaseBtn.prop("disabled", true);
          }
        });
      });

      refreshInfo();
    },
    error: function (xhr, stat, error) {
      console.log(xhr.responseText, stat, error);
    },
    complete: function () {
    },
  });
});
let refreshInfo = () => {
  $("#printinvoice").show();
  let orderid = $("#orderid").val();
  $.ajax({
    type: "POST",
    url: url + "api/cashier/checkItem",
    data: { checkItem: orderid },
    dataType: "json",
    success: function (res) {
      $(".totalitem").text(res.totalItems);
      $(".totalpriceitem, #totalamount").text(res.totalPrice);
    },
    error: function (xhr, stat, error) {
      console.log(xhr.responseText, stat, error);
    },
    complete: function () {
      $("#quantity").modal("hide");
    },
  });
};

$("#printinvoice").on("click", function () {
	console.log(custName)
  let orderid = $("#orderid").val();
  $.ajax({
    type: "POST",
    url: url + "api/cashier/payment",
    data: { payment: orderid, totalamount: $("#totalamount").text() },
    dataType: "json",
    success: function (res) {
      console.log(res);
	  let orders;
	  $.each(res.orderItem, function (ind, val) {
		orders += ` <tr>
		<td>${val.serial_id}</td>
		<td>${val.name}</td>
		<td>${val.quantity}</td>
		<td>${val.totalPrice}</td>
	   </tr>`
	  })
	  $('.orderItems').append(orders)
    },
    error: function (xhr, text, error) {
      console.log(xhr.responseText, text, error);
    },
    complete: function () {
		$('#invoicenum').text(orderid)
		$('#cuname').text($('#custName').text())
      $("#printreceipt").modal("show");
    },
  });
});
$('#printreceipt').on('hidden.bs.modal', function () {
	location.replace('/')
})
