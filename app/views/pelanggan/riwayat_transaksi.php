<?php
require_once __DIR__ . '/../../config/database.php';

session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["role"])) {
    header("Location: login.php");
    exit();
}

// Periksa apakah NIK pengguna tersedia di dalam sesi
if (!isset($_SESSION["nik"])) {
    header("Location: login.php");
    exit();
}

// Mengambil NIK pengguna yang sedang login
$nik = $_SESSION['nik'];

// Mengambil data riwayat transaksi berdasarkan NIK pengguna dan diurutkan berdasarkan Nama Type
$query = "SELECT * FROM viewriwayattransaksi WHERE NIK = '$nik'";

// Periksa apakah parameter sort ada dalam URL
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    if ($sort == 'asc') {
        $query .= " ORDER BY NmType ASC";
    } elseif ($sort == 'desc') {
        $query .= " ORDER BY NmType DESC";
    }
}

$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi | JAVA ELLTRANS Car Rental</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="navbar-brand" href="#"> <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'riwayat_transaksi.php') ? 'active' : ''; ?>" href="../pelanggan/riwayat_transaksi.php">Riwayat Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'daftar-mobil.php') ? 'active' : ''; ?>" href="../pelanggan/daftar-mobil.php">Koleksi Mobil</a>
                    </li>
                </ul>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <!-- Tombol Profile -->
                <a href="../profil/profil.php" class="btn me-md-2 text-white" type="button" style="background-color: #E57C23;">Profile</a>
                <!-- Tombol Logout -->
                <a href="../home/index.php" class="btn text-white me-md-5" type="button" style="background-color: #E57C23;">Logout</a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container">
        <h1 class="mt-4 text-center">Riwayat Transaksi</h1>
        <table class="table mt-4">
            <thead class="table-dark">
                <tr>
                    <th>No Transaksi</th>
                    <th>NIK</th>
                    <th>Nama Type <a href="?sort=asc"><i class="bi bi-sort-alpha-down"></i></a><a href="?sort=desc"><i class="bi bi-sort-alpha-down-alt"></i></a></th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali Rencana</th>
                    <th>Total Harga</th>
                    <th>Status Transaksi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['NoTransaksi'] . "</td>";
                    echo "<td>" . $row['NIK'] . "</td>";
                    echo "<td>" . $row['NmType'] . "</td>";
                    echo "<td>" . $row['Tanggal_Pesan'] . "</td>";
                    echo "<td>" . $row['Tanggal_Pinjam'] . "</td>";
                    echo "<td>" . $row['Tanggal_Kembali_Rencana'] . "</td>";
                    echo "<td>" . $row['TotalHarga'] . "</td>";
                    echo "<td>" . $row['StatusTransaksi'] . "</td>";
                    echo '<td><a href="cetak_kuitansi.php?notransaksi=' . $row['NoTransaksi'] . '" class="btn btn-secondary">Cetak Kuitansi</a></td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="footer">
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
    <!-- End Footer -->
    <!-- Copyright -->
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Java ELLTRANS Car Rental 2023.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>