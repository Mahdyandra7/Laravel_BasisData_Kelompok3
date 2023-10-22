<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Roles List</title>
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
              <h6>User Admin</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

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
        <a class="nav-link " href="/roles">
          <i class="bi bi-briefcase"></i>
          <span>Roles</span>
        </a>
      </li><!-- End Edit User Nav -->

    </ul>

  </aside><!-- End Sidebar-->
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Roles List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Roles</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <p>
                <div class="d-grid gap-2 mt-3">
                  <a type="button" class="btn btn-outline-success rounded-pill btn-sm" href="/addroles"><i class="bi bi-bookmark-plus"></i> | Add New Roles</a>
                </div>
              </p>

              <!-- Table with stripped rows -->
              <table class="table table-hover datatable">
                  <thead>
                      <tr>
                          <th scope="col">RoleId</th>
                          <th scope="col">Role Name</th>
                          <th scope="col">Departement</th>
                          <th scope="col">Period</th>
                          <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                      @foreach($roles as $role)
                          <tr>
                              <th scope="row">{{ $role->id }}</th>
                              <td>{{ $role->nama_role }}</td>
                              <td>{{ $role->dept->nama_kementrian }}</td>
                              <td>{{ $role->periode }}</td>
                              <td>
                                <button type="button" class="btn btn-success btn-sm" id="editBtn_{{ $role->id }}" data-bs-toggle="modal" data-bs-target="#largeModal_{{ $role->id }}"><i class="bi bi-pencil"></i> | Edit Role</button>
                                <div class="modal fade" id="largeModal_{{ $role->id }}" tabindex="-1">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Edit Roles "<strong>{{ $role->nama_role }}</strong>"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <label for="inputText" class="col-sm-2 col-form-label"> Roles Name</label>
                                            <div class="col-sm-12">
                                              <div class="input-group mb-3 has-validation">
                                                <input type="text" name="rolesname" class="form-control" placeholder="Roles Name" aria-label="Roles Name" aria-describedby="basic-addon1" value="{{ $role->nama_role }}" required>
                                                <div class="invalid-feedback">Please enter name of the roles.</div>
                                              </div>
                                            </div>

                                            <label for="inputText" class="col-sm-2 col-form-label"> Period</label>
                                            <div class="col-sm-12">
                                              <div class="input-group mb-3 has-validation">
                                                <input type="number" name="rolesperiod" class="form-control" placeholder="Roles Period" aria-label="Roles Period" aria-describedby="basic-addon1" value="{{ $role->periode }}" required>
                                                <div class="invalid-feedback">Please enter period of the roles.</div>
                                              </div>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Departement</label>

                                              <div class="col-sm-12">
                                                <select id="departementSelect" class="form-select input-group mb-3 has-validation" name="rolesdept" aria-label="Default select example" required>
                                                  <option selected disabled value>Select Departement</option>
                                                  @foreach($dept as $dep)
                                                    <option value="{{ $dep->id }}">{{ $dep->nama_kementrian }}</option>
                                                  @endforeach
                                                  <div class="invalid-feedback">Please select departement for the roles.</div>
                                                </select>
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

                                <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#verticalycentered_{{ $role->id }}"></i></button>
                                <div class="modal fade" id="verticalycentered_{{ $role->id }}" tabindex="-1">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Delete Roles "<strong>{{ $role->nama_roles }}</strong>"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Are you sure want to delete this role?</p>
                                        <strong>Note: </strong>You cannot bring back this role once you delete it.
                                      </div>
                                        <form method="POST" action="{{ route('role.destroy', ['id' => $role->id]) }}">
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
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              <!-- End Table with stripped rows -->

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