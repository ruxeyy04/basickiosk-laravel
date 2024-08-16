<!doctype html>
<html lang="en">

<head>
  <title>Point of Sale - Add Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../functions/cookies.js"></script>
  <script src="../functions/login/login-incharge.js"></script>
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
        <h3>Add Product</h3>
      </div>
    <form id="add">
      <div class="row mb-2 gx-5">
        <!-- add account -->
        <div class="">
          <div class="bg-secondary-soft px-4  rounded">
            <div class="row g-3">
                <!-- image ID -->
              <div class="col-md-6">
                <label>Food Image</label>
                <input type="file" name="image" id="image" class="form-control" required accept=".png, .jpg, .jpeg">
              </div>
              <!-- Serial ID -->
              <div class="col-md-6">
                <label>Serial No.</label>
                <input type="text" name="serial" id="serial" class="form-control" required>
              </div>
              <!-- name -->
              <div class="col-md-6">
                <label>Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>
              <!-- manufacturer -->
              <div class="col-md-3">
                <label>Manufacturer</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
              </div>
              <!-- manufacturer date -->
              <div class="col-md-3">
                <label>Manufactured Date</label>
                <input type="date" name="mandate" id="mandate" class="form-control" required>
              </div>
              <!-- exp date -->
              <div class="col-md-3">
                <label>Expiration Date</label>
                <input type="date" name="expdate" id="expdate" class="form-control" required>
              </div>
              <!-- price -->
              <div class="col-md-3">
                <label>Price</label>
                <input type="number" step=".01" name="price" id="price" class="form-control" required>
              </div>
              <!-- quantity -->
              <div class="col-md-3">
                <label>Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="0" required>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- Row END -->
      <!-- button -->
      <div class="">
        <button type="submit" name="add"  class="btn btn-success">Add Product</button>
      </div>
    </form>

    </div>

    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../functions/products.js"></script>
</body>

</html>