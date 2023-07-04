<?php
require_once(__DIR__ . '/../../config/database.php');
require_once(__DIR__ . '/../../../vendor/midtrans-php-master/Midtrans.php');

// Check if data is sent from booking_form.php
if (isset($_GET['NoPlat']) && isset($_GET['IdType'])) {
    $NoPlat = $_GET['NoPlat'];
    $IdType = $_GET['IdType'];

    // Retrieve the data from the database based on NoPlat
    $queryTransaksi = "SELECT NoTransaksi, TotalHarga FROM viewriwayattransaksi WHERE NoPlat = '$NoPlat'";
    $resultTransaksi = mysqli_query($db, $queryTransaksi);

    if (mysqli_num_rows($resultTransaksi) > 0) {
        $rowTransaksi = mysqli_fetch_assoc($resultTransaksi);
        $NoTransaksi = $rowTransaksi['NoTransaksi'];
        $Jumlah_Bayar = $rowTransaksi['TotalHarga'];
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form values
        $NoTransaksi = uniqid();
        $NIK = $_POST['NIK'];
        $Tanggal_Pesan = $_POST['Tanggal_Pesan'];
        $Tanggal_Pinjam = $_POST['Tanggal_Pinjam'];
        $Tanggal_Kembali_Rencana = $_POST['Tanggal_Kembali_Rencana'];
        $Id_Sopir = $_POST['Id_Sopir'];

        // Calculate the total rental price
        $Tanggal_PinjamObj = new DateTime($Tanggal_Pinjam);
        $Tanggal_Kembali_RencanaObj = new DateTime($Tanggal_Kembali_Rencana);
        $lamaPinjam = $Tanggal_PinjamObj->diff($Tanggal_Kembali_RencanaObj)->days;

        $Jumlah_Bayar = $hargaSewa * $lamaPinjam;

        // Check if the transaction number already exists in the table
        $checkQuery = "SELECT * FROM transaksi WHERE NoTransaksi = '$NoTransaksi'";
        $checkResult = mysqli_query($db, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // If the transaction number already exists, display an error message or ask the user to enter a different transaction number
            echo '<div class="alert alert-danger" role="alert">
                        Nomor transaksi sudah ada. Silakan masukkan nomor transaksi yang berbeda.
                    </div>';
        } else {
            // Save data to the database
            $queryInsert = "INSERT INTO transaksi (NoTransaksi, NIK, Tanggal_Pesan, Tanggal_Pinjam, Tanggal_Kembali_Rencana, Id_Sopir, StatusTransaksi, Jumlah_Bayar, IdMobil, NoPlat)
                            VALUES ('$NoTransaksi', '$NIK', '$Tanggal_Pesan', '$Tanggal_Pinjam', '$Tanggal_Kembali_Rencana', '$Id_Sopir', 'Proses', '$Jumlah_Bayar', '$NoPlat')";

            // Execute query
            if (mysqli_query($db, $queryInsert)) {
                // Configure Midtrans
                \Midtrans\Config::$serverKey = 'Mid-server-tlYAkZL6FGWDVTOSxk_id01I';
                \Midtrans\Config::$isProduction = false;

                // Create a new transaction in Midtrans
                $transaction_details = array(
                    'order_id' => $NoTransaksi,
                    'gross_amount' => $Jumlah_Bayar
                );

                $transaction = \Midtrans\Snap::createTransaction($transaction_details);
                if ($transaction) {
                    // Redirect to Midtrans payment page
                    header('Location: booking_success.php?NoTransaksi=' . $NoTransaksi);
                    exit();
                } else {
                    // Handle transaction creation error
                    echo 'Terjadi kesalahan saat membuat transaksi. Silakan coba lagi.';
                }
            } else {
                // Handle query execution error
                echo 'Terjadi kesalahan saat menyimpan data transaksi. Silakan coba lagi.';
            }
        }
    }
}

?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pembayaran | JAVA ELLTRANS Car Rental</title>
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
                        <a class="navbar-brand" href="#"><img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'riwayat_transaksi.php') ? 'active' : ''; ?>" href="../pelanggan/riwayat_transaksi.php">Riwayat Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'daftar-mobil.php') ? 'active' : ''; ?>" href="../pelanggan/daftar-mobil.php">Koleksi Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'booking_form.php') ? 'active' : ''; ?>" href="../form/booking_form.php">Form Booking Mobil</a>
                    </li>

                </ul>


            </div>

            <!-- Tombol Profile -->
            <a href="../profil/profil.php" class="btn me-md-2 text-white" type="button" style="background-color: #E57C23;">Profile</a>
            <!-- Tombol Logout -->
            <a href="../home/index.php" class="btn text-white me-md-5" type="button" style="background-color: #E57C23;">Logout</a>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Pembayaran -->
    <div class="container">
        <h1 class="mt-4 text-center">Pembayaran</h1>
        <form method="POST" action="../form/booking_success.php">
            <!-- Form fields -->
            <div class="mb-3">
                <label for="NoTransaksi" class="form-label">Nomor Transaksi</label>
                <input type="text" class="form-control" id="NoTransaksi" name="NoTransaksi" value="<?php echo $NoTransaksi; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="Total_Bayar" class="form-label">Total Bayar</label>
                <input type="text" class="form-control" id="Total_Bayar" name="Total_Bayar" value="<?php echo $Jumlah_Bayar; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="rekening_admin" class="form-label">Silahkan Transfer ke No Rekening Berikut</label>
                <input type="text" class="form-control" id="rekening_admin" name="rekening_admin" value="858735765 (BCA)" readonly>
            </div>
            <div class="mb-3">
                <label for="namaPengirim" class="form-label">Nama Pengirim</label>
                <input type="text" class="form-control" id="namaPengirim" name="namaPengirim" required>
            </div>
            <div class="mb-3">
            <label for="metodePembayaran" class="form-label">Metode Pembayaran</label>
            <select class="form-control" id="metodePembayaran" name="metodePembayaran" required>
                <option value="">Pilih Metode Pembayaran</option>
                <option value="bni">Transfer Bank BNI</option>
                <option value="bri">Transfer Bank BRI</option>
                <option value="mandiri">Transfer Bank Mandiri</option>
                <option value="permata">Transfer Bank Permata</option>
                <option value="gopay">GoPay</option>
            </select>
        </div>
            <div class="mb-3">
                <label for="tanggalPembayaran" class="form-label">Tanggal Pembayaran</label>
                <input type="date" class="form-control" id="tanggalPembayaran" name="tanggalPembayaran" required>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Pesan Sekarang</button>
        </form>
    </div>
    <!-- End Pembayaran -->


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
            <div class="row text-center">
                <div class="col-lg-12">
                    <p>© 2023 JAVA ELLTRANS Car Rental - All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Copyright -->

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- End JS -->
</body>

</html>