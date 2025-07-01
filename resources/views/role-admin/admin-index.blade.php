<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
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
        <a class="nav-link " href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/users">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Performance</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Warehouse</button>
            </li>
          </ul>
          <div class="tab-content pt-2" id="borderedTabContent">
            <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">

              <p></p>

              <div class="row">
                <div class="col-lg-12">
                  <select class="form-select" id="monthSelect" name="monthSelect" aria-label="Default select example" onchange="selectMonth(this.value)">
                    <option selected disabled value="0">Select Month</option>
                    <option value="0">All</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>

                <script>
                  function selectMonth(value) {
                    // Redirect to the course-list route with the selected value as a query parameter
                    window.location.href = '/?monthSelect=' + value;
                  }
                </script>

                <p></p>

                <div class="col-lg-7">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Departement Program Progress</h5>
                      <table class="table table-hover">
                        <div id="columnChart"></div>
                        <script>
                          document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#columnChart"), {
                              series: [{
                                name: 'Verified',
                                data: {{ json_encode($VerifiedcountList) }}
                              }, {
                                name: 'Pending',
                                data: {{ json_encode($PendingcountList) }}
                              }, {
                                name: 'Revision',
                                data: {{ json_encode($RevisioncountList) }}
                              }],
                              chart: {
                                type: 'bar',
                                height: 350
                              },
                              plotOptions: {
                                bar: {
                                  horizontal: false,
                                  columnWidth: '55%',
                                  endingShape: 'rounded'
                                },
                              },
                              dataLabels: {
                                enabled: false
                              },
                              stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent']
                              },
                              xaxis: {
                                categories: ['Research Development', 'Human Resource', 'Media and Creative', 'Public Relation'],
                              },
                              yaxis: {
                                title: {
                                  text: 'Total Progress'
                                }
                              },
                              fill: {
                                opacity: 1
                              },
                              tooltip: {
                                y: {
                                  formatter: function(val) {
                                    return val + " file proker"
                                  }
                                }
                              }
                            }).render();
                          });
                        </script>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Staff Contributions Score</h5>
                      <div id="barChart"></div>
                      <script>
                        document.addEventListener("DOMContentLoaded", () => {
                          // Data awal
                          const originalData = {{ json_encode($UsercountList) }};

                          // Menggabungkan data dengan kategori
                          const combinedData = originalData.map((value, index) => ({
                            value,
                            category: ['Randi', 'Budi', 'Anton', 'Dewi', 'Andi', 'Fina', 'Niko', 'Lini'][index]
                          }));

                          // Mengurutkan data berdasarkan nilai dari besar ke kecil
                          const sortedData = combinedData.sort((a, b) => b.value - a.value);

                          // Mendapatkan kategori dan data setelah diurutkan
                          const categories = sortedData.map(item => item.category);
                          const sortedValues = sortedData.map(item => item.value);

                          // Membuat grafik dengan data yang telah diurutkan
                          new ApexCharts(document.querySelector("#barChart"), {
                            series: [{
                              data: sortedValues
                            }],
                            chart: {
                              type: 'bar',
                              height: 350
                            },
                            plotOptions: {
                              bar: {
                                borderRadius: 4,
                                horizontal: true,
                              }
                            },
                            dataLabels: {
                              enabled: false
                            },
                            xaxis: {
                              categories: categories,
                            }
                          }).render();
                        });
                      </script>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Departement Monthly Progress</h5>

                      <!-- Line Chart -->
                      <div id="reportsChart"></div>

                      <script>
                        document.addEventListener("DOMContentLoaded", () => {
                          new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [{
                                name: 'Research and Development',
                                data: {{ json_encode($RnDcountsList) }},
                              },
                              {
                                name: 'Human Resource',
                                data: {{ json_encode($HRcountsList) }}
                              },
                              {
                                name: 'Media and Creative',
                                data: {{ json_encode($MnCcountsList) }}
                              },
                              {
                                name: 'Public Relation',
                                data: {{ json_encode($PRcountsList) }}
                              }
                            ],
                            chart: {
                              height: 350,
                              type: 'area',
                              toolbar: {
                                show: false
                              },
                            },
                            markers: {
                              size: 4
                            },
                            colors: ['#4154f1', '#2eca6a', '#ff771d', '#800080'],
                            fill: {
                              type: "gradient",
                              gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                              }
                            },
                            dataLabels: {
                              enabled: false
                            },
                            stroke: {
                              curve: 'smooth',
                              width: 2
                            },
                            xaxis: {
                              type: 'category',
                              categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
                            },
                            tooltip: {
                              x: {
                                format: 'dd/MM/yy HH:mm'
                              },
                            }
                          }).render();
                        });
                      </script>
                      <!-- End Line Chart -->

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Department Progress Table</h5>

                    <!-- Table with stripped rows -->
                    <table class="table table-hover table-striped datatable">
                      <thead>
                        <tr>
                          <th>Month</th>
                          <th>Year</th>
                          <th>Departement Name</th>
                          <th>Program Name</th>
                          <th>File Name</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dataProgressKementrian as $data)
                        <tr>
                          <td>{{ $data->bulan }}</td>
                          <td>{{ $data->tahun }}</td>
                          <td>{{ $data->nama_kementrian }}</td>
                          <td>{{ $data->nama_proker }}</td>
                          <td>{{ $data->nama_file }}</td>
                          <td>{{ $data->status }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                  </div>

                  <br></br>

                  <div class="card-body">
                    <h5 class="card-title">Staff Contribution Table</h5>

                    <!-- Table with stripped rows -->
                    <table class="table table-hover table-striped datatable">
                      <thead>
                        <tr>
                          <th>Bulan</th>
                          <th>Tahun</th>
                          <th>Nama Proker</th>
                          <th>Nama File</th>
                          <th>Status</th>
                          <th>Nama User</th>
                          <th>Kementrian User</th>
                          <th>Nilai Kontribusi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dataKontribusiUser as $data)
                        <tr>
                          <td>{{ $data->bulan }}</td>
                          <td>{{ $data->tahun }}</td>
                          <td>{{ $data->nama_proker }}</td>
                          <td>{{ $data->nama_file }}</td>
                          <td>{{ $data->status }}</td>
                          <td>{{ $data->nama_user }}</td>
                          <td>{{ $data->kementrian_user }}</td>
                          <td>{{ $data->nilai_kontribusi }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                  </div>
                </div>

              </div>
            </div>
          </div><!-- End Bordered Tabs -->
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