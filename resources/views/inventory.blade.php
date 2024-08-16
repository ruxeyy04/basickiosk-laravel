<!doctype html>
<html lang="en">
  <head>
  	<title>Point of Sale - Inventory</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/profile.png);"></a>
	        <ul class="list-unstyled components mb-5">
            <li >
	              <a href="{{route('main.page')}}">Cashier</a>
	          </li>
	          <li>
	              <!-- <a href="/about.html">About</a> -->
                <a href="{{route('main.about')}}">About</a>
	          </li>
            <li class="active"> 
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

        <div class="about-section">
		  <h3>Product Inventory</h3>
		</div>
    <div class="table-responsive">
      <table id="inventory" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Serial #</th>
                <th>Prod. Name</th>
                <th>Manufacturer</th>
                <th>Manufactured Date</th>
                <th>Expiration Date</th>
                <th>Price</th>
                <th>Stocks</th>
                <th>Item Sold</th>
                <th>Total Sales</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Serial #</th>
                    <th>Prod. Name</th>
                    <th>Manufacturer</th>
                    <th>Manufactured Date</th>
                    <th>Expiration Date</th>
                    <th>Price</th>
                    <th>Stocks</th>
                    <th>Item Sold</th>
                    <th>Total Sales</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
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
    <script src="js/pages/inventory.js"></script>
    <script src="functions/login/login-cashier.js"></script>
<script>

</script>
  </body>
</html>