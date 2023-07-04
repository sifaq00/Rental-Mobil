<?php include("/xampp/htdocs/project-rental-mobil/app/config/database.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - JAVA ELLTRANS Car Rental</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">

    <!-- Bootstrap CSS (optional, if not already included in your code) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Your custom CSS -->
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Navbar brand and toggle button -->

                <!-- Navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="./dashboard.php" class="nav-link active">Dashboard</a>
                    </li>
                </ul>

                <!-- Right-aligned navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="../home/index.php" class="nav-link btn btn-primary">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Sidebar items -->
                        <li class="nav-item">
                            <a href="./dashboard.php" class="nav-link">
                                <p>
                                    <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="Javaelltrans Logo" height="30px" width="200px">
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./edit-mobil.php" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z" />
                                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z" />
                                </svg>
                                <p>
                                    Data Mobil
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./edit-user.php" class="nav-link">
                                <i class="nav-icon bi bi-person"></i>
                                <p>
                                    Data Pengguna
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./data-transaksi.php" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-text"></i>
                                <p>
                                    Data Transaksi
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End sidebar menu -->
            </div>
            <!-- End sidebar -->
        </aside>
        <!-- End Main Sidebar Container -->
        <!-- End Main Sidebar Container -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid mt-5 mb-5">
                    <!-- Activation Form -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Aktivasi Pengguna</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="./proses-aktivasi-user.php" method="POST">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                        <select class="browser-default custom-select" name="IsActive" id="IsActive">
                                            <option value="1">Aktif</option>
                                            <option value="0" selected>Tidak Aktif</option>
                                        </select>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4" value="Aktivasi" name="simpan">Aktivasi</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="">
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-4">
                                <h3><i class="bi bi-geo-alt"></i> Lokasi</h3>
                                <p>Perum Puri Tamanan Indah, Grojogan Rt.07, Tamanan, Banguntapan, Bantul, Bantul, 55191</p>
                            </div>
                            <div class="col-md-4">
                                <h3><i class="bi bi-envelope"></i> Email</h3>
                                <p>javaelltrans@gmail.com</p>
                            </div>
                            <div class="col-md-4">
                                <h3><i class="bi bi-phone"></i> Kontak</h3>
                                <p>Telepon: 087754153495</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Main Footer -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap 5 JS (optional, if not already included in your page) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>

    <!-- Your custom script -->
    <script src="https://localhost/project-rental-mobil/app/js/script.js"></script>
</body>

</html>