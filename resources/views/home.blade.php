
<!doctype html>
<html lang="en">
  <head>
  	<title>Point of Sale - Cashier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/profile.png);"></a>
	        <ul class="list-unstyled components mb-5">
            <li class="active">
	              <a href="{{route('main.page')}}">Cashier</a>
	          </li>
	          <li>
                <a href="{{route('main.about')}}">About</a>
	          </li>
            <li>
	              <a href="{{route('main.inventory')}}">Inventory</a>
	          </li>
            <li>
	              <a href="{{route('main.profile')}}">Profile</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Educational Purpose Only
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" id="out" href="#!">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4">Cashier</h2>
          <div class="container">
              <div class="container-sm">
          <div class="container-fluid">
            <div class="row">
                <!--LEFT-->
                <div class="col-lg-3" >
                  <div class="form-group">
                    <div class="row">
                      <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addcustomer" id="addcustBtn">Add Customer</button>
                      <button id="rmvcustBtn" class="btn btn-danger btn-sm">Remove Customer</button>
                       
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <p><strong><span id="custname">Note: Add Customer First</span></strong></p>
                    </div>
                    <div class="row">
                      <p><strong>Total Items: <span class="totalitem">0</span></strong></p>
                    </div>
                    <div class="row">
                      <p><strong>Total Item Price: ₱ <span class="totalpriceitem">0.00</span></strong></p>
                    </div>
                    <div class="row">
                      <h5><strong>Total Amount: ₱ </strong><span id="totalamount">0.00</span></h3>
                    </div>
                  </div>
                  <button class="btn btn-success" id="printinvoice" value="" data-target="#printreceipt" data-toggle="modal">Print Invoice</button>
                </div>

                <!--RIGHT-->
                <div class="col-lg-9" >
                  <div class="form-group table-responsive" >
                    <table id="products" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>Serial #</th>
                              <th>Image</th>
                              <th>Product Name</th>
                              <th>Price</th>
                              <th>Exp. Date</th>
                              <th>Stocks</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                          </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>Serial #</th>
                              <th>Image</th>
                              <th>Product Name</th>
                              <th>Price</th>
                              <th>Exp. Date</th>
                              <th>Stocks</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                  </div>
                </div>
                <!-- Add Customer Modal -->
                  <div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="addcustomer" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="addcustomerLabel">Add Customer Name</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="hidden" name="orderid" id="orderid">
                            <input type="text" class="form-control" id="fname">
                          </div>
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="lname">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button id="customeradd" type="submit" class="btn btn-primary">Add Customer</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Print Receipt Modal -->
                
                <div class="modal fade" id="printreceipt" tabindex="-1" role="dialog" aria-labelledby="printreceipt" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="printreceiptLabel">Invoice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body invoiceprint">
                        <div class="card p-2">
                          <h3 class="text-center">Thank You for Purchasing</h3>
                          <hr>
                        <h5>Invoice #: <span id="invoicenum"></span></h5>
                        <h5>Customer Name: <span id="cuname"></span></h5>
                        <hr>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Serial #</th>
                              <th>Prod. Name</th>
                              <th>Quantity</th>
                              <th>Total Price</th>
                            </tr>
                          </thead>
                          <tbody class="orderItems">
                          
                          </tbody>
                            <tr>
                              <th></th>
                              <th></th>
                              <th>Total Items: </th>
                              <th><span class="totalitem"></span></th>
                            </tr>
                            <tr>
                              <td></td>
                              <th></th>
                              <th><h6>Total Amount: </span></h6></th>
                              <th>₱ <span class="totalpriceitem"></span></th>
                            </tr>
                          </tfoot>
                        </table>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="window.location.replace('/')">Next Customer</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Quantity -->
                <div class="modal fade" id="quantity" tabindex="-1" role="dialog" aria-labelledby="quantity" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="quantityLabel">Product Quantity</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" id="prodNamee" readonly>
                        </div>
                        <div class="form-group">
                          <label>Quantity</label>
                          <input id="quantityyy" type="number" min="1" max="" class="form-control">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="purchasee" type="button" class="btn btn-success">Purchase</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
		</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="functions/cookies.js"></script>
    <script src="js/main.js"></script>
    <script src="js/pages/home.js"></script>
    <script src="functions/login/login-cashier.js"></script>
  </body>
</html>