<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Upload Course Progress File</title>
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
            <img src="assets/img/messages-2.jpg" alt="Profile" class="rounded-circle">
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
        <a class="nav-link " data-bs-target="#course-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Work Program</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="course-nav" class="nav-content " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/course-list">
              <i class="bi bi-circle"></i><span>Program List</span>
            </a>
          </li>
          <li>
            <a href="/course-progress" class="active">
              <i class="bi bi-circle"></i><span>Program Progress</span>
            </a>
          </li>
        </ul>
      </li><!-- End course Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/timeline">
          <i class="bi bi-calendar2-event"></i>
          <span>Timeline</span>
        </a>
      </li><!-- End Program Kerja Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Program List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Work Program</li>
          <li class="breadcrumb-item "><a href="course-progress">program Progress</a></li>
          <li class="breadcrumb-item active">Upload Program Progress File</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Upload New Program Progress File</h5>

              <!-- General Form Elements -->
              <form action="{{ route('upload-file') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="documentTitle" class="col-sm-1 col-form-label">Program</label>
                  <div class="col-sm-11">
                    <div class="input-group mb-3 has-validation">
                      <select id="departementSelect" class="form-select input-group mb-2 has-validation" name="course" aria-label="Default select example" required>
                        <option selected disabled value>Select Program</option>
                        @foreach($proker as $pro)
                          <option value="{{ $pro->id }}">{{ $pro->nama_proker }}</option>
                        @endforeach
                        <div class="invalid-feedback">Please select the departement for new roles.</div>
                      </select>
                    </div>
                  </div>

                  <label for="documentTitle" class="col-sm-1 col-form-label">File Name</label>
                  <div class="col-sm-11">
                    <div class="input-group mb-3 has-validation">
                      <input type="text" name="title" class="form-control" id="documentTitle"  placeholder="File Name" required>
                      <div class="invalid-feedback">Please enter a title for the document.</div>
                    </div>
                  </div>

                  <label for="fileInput" class="col-sm-1 col-form-label">File Input</label>
                  <div class="col-sm-11">
                    <div class="input-group mb-3 has-validation">
                      <input type="file" name="file" class="form-control" id="fileInput" required>
                      <div class="invalid-feedback">Please select a file to upload.</div>
                    </div>
                  </div>
                  
                  <label for="documentDesc" class="col-sm-1 col-form-label">Description</label>
                  <div class="col-sm-11">
                    <div class="input-group mb-3 has-validation">
                      <textarea name="desc" class="form-control" style="height: 100px;" id="documentDesc"  placeholder="File Description" required></textarea>
                      <div class="invalid-feedback">Please enter a description about the document.</div>
                    </div>
                  </div>

                  <label for="documentTitle" class="col-sm-1 col-form-label">Contributors</label>
                  <div class="col-sm-11" id="contributions-container">
                      <div class="contribution-item">
                            <select class="form-select input-group mb-3 has-validation" name="staff[]" aria-label="Default select example" required>
                                <option selected disabled value>Select Staff</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                @endforeach
                            </select>
                            <div class="input-group mb-3 has-validation">
                                <input type="number" name="scores[]" class="form-control" placeholder="Contribution Score" required>
                                <div class="invalid-feedback">Please enter a progress score.</div>
                            </div>
                      </div>
                  </div>
                  <div class="text-center">
                    <button type="button" id="add-contribution" class="btn btn-outline-success btn-sm">More User</button>
                  </div>

                  <br></br>

                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                  <script>
                      $(document).ready(function () {
                          // Tambahkan elemen formulir saat tombol "Add Contribution" diklik
                          $("#add-contribution").click(function () {
                              var newItem = $("#contributions-container .contribution-item:first").clone();
                              newItem.find("select").val([]);
                              newItem.find("input[type=number]").val("");
                              $("#contributions-container").append(newItem);
                          });
                      });
                  </script>

                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Upload File</button>
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