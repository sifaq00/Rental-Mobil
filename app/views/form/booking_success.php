<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Form Booking Mobil - Sukses</title>
    <style>
        /* Custom Styles */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .booking-success {
            text-align: center;
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .booking-success-heading {
            color: #E57C23;
            margin-bottom: 20px;
        }

        .booking-success-message {
            color: #333;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .booking-success-info {
            color: #666;
            margin-bottom: 20px;
        }

        .booking-success-btn {
            color: #fff;
            background-color: #E57C23;
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .booking-success-btn:hover {
            background-color: #C45D0D;
        }

        .footer {
            margin-top: auto;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center"> <!-- Added text-center class -->
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

    <!-- Booking Sukses -->
    <div class="container">
        <div class="booking-success">
            <h1 class="booking-success-heading">Booking Mobil Berhasil</h1>

            <?php
            // Menampilkan pesan sukses jika booking berhasil dilakukan
            if (isset($_POST["type"])) {
                echo "<p class='booking-success-message'>Booking mobil berhasil dilakukan!</p>";
            }
            ?>

            <p class="booking-success-info">Terima kasih telah melakukan booking mobil di JavaEllTrans😊.
                <br> Segera lakukan pembayaran kemudian cetak kuitansi riwayat transaksi dan serahkan ke petugas JavaEllTrans!
                <br>
                Silahkan datang ke tempat JavaEllTrans saat akan mengambil mobilnya!</p>

            <a href="../pelanggan/riwayat_transaksi.php" class="btn btn-primary booking-success-btn">Cek Riwayat Transaksi</a>
        </div>
    </div>
    <!-- End Booking Sukses -->

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

</body>

</html>