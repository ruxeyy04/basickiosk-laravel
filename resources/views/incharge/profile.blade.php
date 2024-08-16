<!doctype html>
<html lang="en">

<head>
  <title>Point of Sale - Profile</title>
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
        <h3>Profile Setting</h3>
      </div>

        <div class="row mb-2 gx-5">
          <!-- add account -->
          <div class="">
            <div class="bg-secondary-soft px-4  rounded">
              <div class="row g-3">
                <!-- username -->
                <div class="col-md-6">
                  <label>Username</label>
                  <input type="text" name="user" id="user" class="form-control"  required>
                </div>
                <!-- password -->
                <div class="col-md-6">
                  <label>Password</label>
                  <input type="text" name="pass" id="pass" class="form-control" required>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- Row END -->
        <!-- button -->
        <div class="">
          <button type="submit" name="update" id="updateacc" class="btn btn-success">Update Account</button>
        </div>
    </div>

    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../functions/profile.js"></script>

</body>

</html>