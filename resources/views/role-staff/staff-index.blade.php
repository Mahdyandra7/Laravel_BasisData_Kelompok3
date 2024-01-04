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
        <a class="nav-link " href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#course-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Work Program</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="course-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/course-list">
              <i class="bi bi-circle"></i><span>Program List</span>
            </a>
          </li>
          <li>
            <a href="/course-progress">
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
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Progress & Timeline</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Users & Departement</button>
            </li>
          </ul>
          <div class="tab-content pt-2" id="borderedTabContent">
            <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                  <div class="col-lg-7">
                      <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Progress Report</h5>
                            <table class="table table-hover">
                              <tbody>
                                  @foreach($proker as $program)
                                  <tr>
                                      <td>
                                          {{ $program->nama_proker }} <br>
                                          <div class="progress mt-3">
                                              <div class="progress-bar" role="progressbar" style="width: {{ number_format(number_format($maxProgress[$program->id] / $program->total_progress, 2)* 100) }}%" aria-valuenow="{{ number_format($maxProgress[$program->id] / $program->total_progress, 2) * 100 }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($maxProgress[$program->id] / $program->total_progress, 2) * 100 }}%</div>
                                          </div>
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                            </table>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-5">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">Timeline Activity</h5>
                              <!-- ... Other timeline content ... -->
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-lg-8">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">User Table</h5>

                      <!-- Table with stripped rows -->
                      <table class="table table-hover table-striped datatable">
                          <thead>
                              <tr>
                                  <th scope="col">UserId</th>
                                  <th scope="col">Username</th>
                                  <th scope="col">Full Name</th>
                                  <!-- <th scope="col">NIM</th> -->
                                  <th scope="col">Roles</th>
                                  <th scope="col">Period</th>
                                  <!-- <th scope="col">Email</th> -->
                                  <!-- <th scope="col">Phones</th> -->
                             </tr>
                          </thead>
                          <tbody>
                              @foreach($users as $user)
                                  <tr>
                                      <th scope="row">{{ $user->id }}</th>
                                      <td>{{ $user->username }}</td>
                                      <td>{{ $user->nama }}</td>
                                      <!-- <td>{{ $user->nim }}</td> -->
                                      <td>{{ $user->role->nama_role }}</td>
                                      <td>{{ $user->role->periode }}</td>
                                      <!-- <td>{{ $user->email }}</td> -->
                                      <!-- <td>{{ $user->no_telp }}</td> -->
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                      <!-- End Table with stripped rows -->

                    </div>
                  </div>

                </div>

                <div class="column col-lg-4">
                  <div>

                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Departement Table</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-hover table-striped datatable">
                            <thead>
                                <tr>
                                    <th scope="col">DeptId</th>
                                    <th scope="col">Departement Name</th>
                                    <th scope="col">Period</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($dept as $dept)
                                    <tr>
                                        <th scope="row">{{ $dept->id }}</th>
                                        <td>{{ $dept->nama_kementrian }}</td>
                                        <td>{{ $dept->periode }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                      </div>
                    </div>

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