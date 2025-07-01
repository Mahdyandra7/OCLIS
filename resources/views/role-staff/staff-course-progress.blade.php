<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Course Progress</title>
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
      <h1>Program Progress</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Work Program</li>
          <li class="breadcrumb-item active">Program Progress</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <p></p>
          <select class="form-select" id="courseSelect" name="courseSelect" aria-label="Default select example" onchange="courseSelect(this.value)">
            <option selected disabled value>Select Program</option>
            @foreach($proker_pic as $program)
              <option value="{{ $program->id }}">{{ $program->nama_proker }}</option>
            @endforeach
          </select>

          <script>
            function courseSelect(value) {
              // Redirect to the course-list route with the selected value as a query parameter
              window.location.href = '/course-progress?courseSelect=' + value;
            }
          </script>
          <p></p>
  
          <!-- Table with hoverable rows -->
          <table class="table datatable table-hover">
            <p>
              <div class="d-grid gap-2 mt-3">
                <a type="button" class="btn btn-outline-success rounded-pill btn-sm" href="/addfile"><i class="bi bi-file-earmark-plus"></i> | Add New Submission</a>
              </div>
            </p>
            <thead>
              <tr>
                <th scope="col">FileId</th>
                <th scope="col">File Name</th>
                <th scope="col">Course Progress (%)</th>
                <th scope="col">Status</th>
                <th scope="col">Messages</th>
                <th scope="col">Link File</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach($files as $file)
                <tr>
                  <th scope="row">{{ $file->id }}</th>
                  <td>{{ $file->nama_file }}</td>
                  <td>
                    @foreach($proker_pic as $program)
                        @if($program->id == $file->id_proker)
                        {{ number_format(number_format( $file->progress_ke / $program->total_progress, 2)* 100) }}%
                        @endif
                    @endforeach
                  </td>
                  <td>{{ $file->status }}</td>
                  <td>{{ $file->messages }}</td>
                  <td>
                    <a type="button" class="btn btn-link btn-sm" href="file:///D:/Kuliah/Semester%205/Basis%20Data/Project/Laravel_Basdat_Kelompok3/storage/app/{{ $file->url_file }}">Link</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success btn-sm" id="editBtn_{{ $file->id }}" data-bs-toggle="modal" data-bs-target="#largeModal_{{ $file->id }}"><i class="bi bi-pencil"></i> | Edit Submission</button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered_{{ $file->id }}"><i class="bi bi-trash"></i></button>
                    <div class="modal fade" id="verticalycentered_{{ $file->id }}" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Delete File "<strong>{{ $file->nama_file }}</strong>"</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure want to delete this file?</p>
                            <strong>Note: </strong>You cannot bring back this file once you delete it.
                          </div>
                            <form method="POST" action="{{ route('file.destroy', ['id' => $file->id]) }}">
                              @csrf
                              @method('DELETE')
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div><!-- End Vertically centered Modal-->  

                    <div class="modal fade" id="largeModal_{{ $file->id }}" tabindex="-1">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Submission "<strong>{{ $file->nama_file }}</strong>"</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{ route('file.update', ['id' => $file->id]) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <label for="documentTitle" class="col-sm-3 col-form-label">File Name</label>
                                <div class="col-sm-12">
                                  <div class="input-group mb-3 has-validation">
                                    <input type="text" name="title" class="form-control" id="documentTitle"  placeholder="File Name" required>
                                    <div class="invalid-feedback">Please enter a title for the document.</div>
                                  </div>
                                </div>

                                <label for="fileInput" class="col-sm-3 col-form-label">File Input</label>
                                <div class="col-sm-12">
                                  <div class="input-group mb-3 has-validation">
                                    <input type="file" name="file" class="form-control" id="fileInput" required>
                                    <div class="invalid-feedback">Please select a file to upload.</div>
                                  </div>
                                </div>

                                <label for="documentDesc" class="col-sm-3 col-form-label">File Description</label>
                                <div class="col-sm-12">
                                  <div class="input-group mb-3 has-validation">
                                    <textarea name="desc" class="form-control" style="height: 100px;" id="documentDesc"  placeholder="File Description" required></textarea>
                                    <div class="invalid-feedback">Please enter a description about the document.</div>
                                  </div>
                                </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div><!-- End Large Modal-->
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with hoverable rows -->

        </div>
      </div>
    </div>

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