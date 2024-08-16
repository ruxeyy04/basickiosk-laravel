<!doctype html>
<html lang="en">

<head>
  <title>Point of Sale - Edit Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="/functions/cookies.js"></script>
  <script src="/functions/login/login-incharge.js"></script>
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/profile.png);"></a>
        <ul class="list-unstyled components mb-5">
          <li class="{{ Route::currentRouteName() === 'incharge.page' ? 'active' : '' }}">
            <a href="{{route('incharge.page')}}">Add Product</a>
          </li>
          <li class="{{ Route::currentRouteName() === 'incharge.viewproduct' ? 'active' : '' }}">
            <a href="{{route('incharge.viewproduct')}}">View Product</a>
          </li>
          <li class="{{ Route::currentRouteName() === 'incharge.profile' ? 'active' : '' }}">
            <a href="{{route('incharge.profile')}}">Profile</a>
          </li>
        </ul>

        <div class="footer">
          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> Educational Purpose Only
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
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
                <a class="nav-link" id="out">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="about-section">
        <h3>Edit Product</h3>
      </div>
      <form action="" id="update">
        <div class="row mb-2 gx-5">
          <!-- add account -->
          <div class="">
            <div class="bg-secondary-soft px-4  rounded">
              <div class="row g-3">
                   <!-- Serial ID -->
                <div class="col-md-12">
                  <label>Image</label>
                 <img src="../prod-img/default.png" class="img-thumbnail" width="150px" id="image">
                 <input type="file" name="image" class="form-control" id="image" accept=".jpg, .png, .jpeg">
                </div>
                <!-- Serial ID -->
                <div class="col-md-6">
                  <label>Serial No.</label>
                  <input type="text" name="serial" class="form-control" id="serial" readonly>
                </div>
                <!-- name -->
                <div class="col-md-6">
                  <label>Product Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <!-- manufacturer -->
                <div class="col-md-3">
                  <label>Manufacturer</label>
                  <input type="text" name="manufacturer" class="form-control" id="manufacturer" required>
                </div>
                <!-- manufacturer date -->
                <div class="col-md-3">
                  <label>Manufactured Date</label>
                  <input type="date" name="mandate" class="form-control" id="mandate"required>
                </div>
                <!-- exp date -->
                <div class="col-md-3">
                  <label>Expiration Date</label>
                  <input type="date" name="expdate" class="form-control" id="expdate" required>
                </div>
                <!-- price -->
                <div class="col-md-3">
                  <label>Price</label>
                  <input type="number" step=".01" name="price" class="form-control" id="price" required>
                </div>
                <div class="col-md-3">
                  <label>Quantity</label>
                  <input type="number" name="quantity" class="form-control" id="quantity" required>
                </div>
                <div class="col-md-3">
                  <label>Status</label>
                  <select name="status" id="status" class="form-control">
                    <option>Available</option>
                    <option >Not Available</option>
                    <option>Expired</option>
                    <option>Damaged</option>
                    <option>Upcoming</option>
                    <option>Outgoing</option>
                  </select>
                </div>
              </div>
  
            </div>
          </div>
        </div> <!-- Row END -->
        <!-- button -->
        <div class="">
          <button type="submit" class="btn btn-success">Update Product</button>
        </div>
      </form>

    </div>

    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/functions/editprod.js"></script>

</body>

</html>