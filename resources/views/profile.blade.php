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
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/profile.png);"></a>
        <ul class="list-unstyled components mb-5">
            <li>
	              <a href="{{route('main.page')}}">Cashier</a>
	          </li>
	          <li>
	              <!-- <a href="/about.html">About</a> -->
                <a href="{{route('main.about')}}">About</a>
	          </li>
            <li>
	              <a href="{{route('main.inventory')}}">Inventory</a>
	          </li>
            <li class="active">
	              <a href="{{route('main.profile')}}">Profile</a>
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
                <a class="nav-link" id="out" href="#!">Logout</a>
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
                  <input type="text" name="pass" id="pass" class="form-control"  required>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- Row END -->
        <!-- button -->
        <div class="">
          <button type="button" name="update" id="updateacc" class="btn btn-success">Update Account</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script src="functions/cookies.js"></script>
    <script src="js/main.js"></script>
    <script src="functions/profile.js"></script>
    <script src="functions/login/login-cashier.js"></script>
    
</body>

</html>