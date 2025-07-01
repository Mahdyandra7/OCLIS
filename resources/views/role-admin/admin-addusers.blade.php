<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add New User</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">3rdGroups</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ $username }}</h6>
              <span>{{ $userrole }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="/profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="/users">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li><!-- End Program Kerja Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/departement">
          <i class="bi bi-diagram-3"></i>
          <span>Departement</span>
        </a>
      </li><!-- End Program Kerja Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/roles">
          <i class="bi bi-briefcase"></i>
          <span>Roles</span>
        </a>
      </li><!-- End Edit User Nav -->

    </ul>

  </aside><!-- End Sidebar-->
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Users List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/users">Users</a></li>
          <li class="breadcrumb-item active">Add New User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New User Form</h5>

              <!-- General Form Elements -->
              <form action="{{ route('store-user') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Username</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3 has-validation">
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                      <div class="invalid-feedback">Please enter the username for new user.</div>
                    </div>
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label"> Password</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3 has-validation">
                      <input type="text" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                      <div class="invalid-feedback">Please enter the password for new user.</div>
                    </div>
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label"> Full Name</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="text" name="fullname" class="form-control" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1">
                    </div>
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label"> Student ID</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" name="studentid" class="form-control" placeholder="Student ID" aria-label="Student ID" aria-describedby="basic-addon1">
                    </div>
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label"> Email</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="text" name="emailname" class="form-control" placeholder="Email Name" aria-label="Email Name" aria-describedby="basic-addon1">
                      <span class="input-group-text">@</span>
                      <input type="text" name="email" class="form-control" placeholder="example.com" aria-label="example.com" aria-describedby="basic-addon1">
                    </div>
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label"> Phone Number</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">+62</span>
                      <input type="number" name="phone" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="basic-addon1">
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">Departement</label>
                  
                    <div class="col-sm-10">
                      <select id="departementSelect" class="form-select input-group mb-3 has-validation" aria-label="Default select example" required>
                        <option selected disabled value>Select User Departement</option>
                        @foreach($dept as $dep)
                          <option value="{{ $dep->id }}">{{ $dep->nama_kementrian }}</option>
                        @endforeach
                        <div class="invalid-feedback">Please select the departement for new user.</div>
                      </select>
                    </div>
                  

                  <label class="col-sm-2 col-form-label">Roles</label>
                  <div class="col-sm-10">
                    <select class="form-select input-group mb-3 has-validation" name="role" aria-label="Default select example" required>
                      <option selected disabled value>Select User Role</option>
                      @foreach($role as $r)
                          <option value="{{ $r->id }}">{{ $r->nama_role }}</option>
                      @endforeach
                      <div class="invalid-feedback">Please select the role for new user.</div>
                    </select>
                  </div>

                  


                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Add User</button>
                    <button type="reset" class="btn btn-secondary">Reset Form</button>
                  </div>

                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by Kelompok 3 Basis Data
    </div>
    <div class="credits">
      SD-A1
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>