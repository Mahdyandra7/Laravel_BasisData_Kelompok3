<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users List</title>
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
          <li class="breadcrumb-item active">Users</li>
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
                  <a type="button" class="btn btn-outline-success rounded-pill btn-sm" href="/addusers"><i class="bi bi-person-plus"></i> | Add New User</a>
                </div>
              </p>

              <!-- Table with stripped rows -->
              <table class="table table-hover datatable">
                  <thead>
                      <tr>
                          <th scope="col">UserId</th>
                          <th scope="col">Username</th>
                          <th scope="col">Full Name</th>
                          <th scope="col">SID</th>
                          <th scope="col">Roles</th>
                          <th scope="col">Period</th>
                          <th scope="col">Email</th>
                          <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                          <tr>
                              <th scope="row">{{ $user->id }}</th>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->nama }}</td>
                              <td>{{ $user->nim }}</td>
                              <td>{{ $user->role->nama_role }}</td>
                              <td>{{ $user->role->periode }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                <button type="button" class="btn btn-success btn-sm" id="editBtn_{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#largeModal_{{ $user->id }}"><i class="bi bi-pencil"></i> | Edit User</button>
                                <div class="modal fade" id="largeModal_{{ $user->id }}" tabindex="-1">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Edit User "<strong>{{ $user->username }}</strong>"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <label for="inputText" class="col-sm-2 col-form-label"> Username</label>
                                            <div class="col-sm-12">
                                              <div class="input-group mb-3 has-validation">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input type="text" name="new_username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $user->username }}" required>
                                                <div class="invalid-feedback">Please enter new username the new user.</div>
                                              </div>
                                            </div>

                                            <label for="inputText" class="col-sm-2 col-form-label"> Password</label>
                                            <div class="col-sm-12">
                                              <div class="input-group mb-3 has-validation">
                                                <input type="text" name="new_password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                                <div class="invalid-feedback">Please enter new password for the user.</div>
                                              </div>
                                            </div>

                                            <label for="inputText" class="col-sm-2 col-form-label"> Full Name</label>
                                            <div class="col-sm-12">
                                              <div class="input-group mb-3">
                                                <input type="text" name="new_fullname" class="form-control" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" value="{{ $user->nama }}">
                                              </div>
                                            </div>

                                            <label for="inputText" class="col-sm-2 col-form-label"> Student ID</label>
                                            <div class="col-sm-12">
                                              <div class="input-group mb-3">
                                                <input type="number" name="new_sid" class="form-control" placeholder="Student ID" aria-label="Student ID" aria-describedby="basic-addon1" value="{{ $user->nim }}">
                                              </div>
                                            </div>

                                            <label for="inputText" class="col-sm-2 col-form-label"> Email</label>
                                            <div class="col-sm-12">
                                              <div class="input-group mb-3">
                                                <input type="text" name="new_email" class="form-control" placeholder="Email Address" aria-label="Email Name" aria-describedby="basic-addon1" value="{{ $user->email }}">
                                              </div>
                                            </div>

                                            <label for="inputText" class="col-sm-2 col-form-label"> Phone Number</label>
                                            <div class="col-sm-12">
                                              <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">+62</span>
                                                <input type="number" name="new_phonenum" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="basic-addon1" value="{{ $user->no_telp }}">
                                              </div>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Department</label>
                                            <div class="col-sm-12">
                                                <select name="new_department" class="form-select input-group mb-3 has-validation" aria-label="Default select example" required>
                                                    <option selected disabled value>Select User Department</option>
                                                    @foreach($dept as $dep)
                                                        <option value="{{ $dep->id }}">{{ $dep->nama_kementrian }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">Please enter the department for the new user.</div>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Roles</label>
                                            <div class="col-sm-12">
                                              <select class="form-select input-group mb-3 has-validation" name="new_role" aria-label="Default select example" required>
                                                <option selected disabled value>Select User Role</option>
                                                @foreach($role as $r)
                                                    <option value="{{ $r->id }}">{{ $r->nama_role }}</option>
                                                @endforeach
                                                <div class="invalid-feedback">Please enter a role for the user.</div>
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

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered_{{ $user->id }}"><i class="bi bi-trash"></i></button>
                                <div class="modal fade" id="verticalycentered_{{ $user->id }}" tabindex="-1">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Delete User "<strong>{{ $user->username }}</strong>"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Are you sure want to delete this user?</p>
                                        <strong>Note: </strong>You cannot bring back this user once you delete it.
                                      </div>
                                        <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
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