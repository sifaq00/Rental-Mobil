<?php
session_start();
include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

$sql = "SELECT m.*, merk.NmMerk, type.NmType FROM mobil m 
        JOIN merk ON m.KdMerk = merk.KdMerk 
        JOIN type ON m.IdType = type.IdType";
$result = mysqli_query($db, $sql);
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Daftar Mobil | JAVA ELLTRANS Car Rental</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <a class="navbar-brand" href="#"> <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'riwayat_transaksi.php') ? 'active' : ''; ?>" href="../pelanggan/riwayat_transaksi.php">Riwayat Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'daftar-mobil.php') ? 'active' : ''; ?>" href="../pelanggan/daftar-mobil.php">Koleksi Mobil</a>
                    </li>
                </ul>
            </div>
            <a href="../profil/profil.php" class="btn me-md-2 text-white" type="button" style="background-color: #E57C23;">Profile</a>
            <a href="../home/index.php" class="btn text-white me-md-5" type="button" style="background-color: #E57C23;">Logout</a>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Daftar Mobil -->
    <section class="container car-collection daftar-mobil">
        <h2 class="text-center pb-3 mt-5">Koleksi Mobil Kami</h2>
        <div class="row justify-content-center">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $gambar = $row['FotoMobil'];
                $NoPlat = $row['NoPlat'];
                $statusRental = $row['StatusRental'];
                $hargaSewa = $row['HargaSewa'];
                $merk = $row['NmMerk'];
                $type = $row['NmType'];
                $transmisi = $row['Transmisi'];
            ?>
                <div class="col-lg-3 col-md-6 mt-5">
                    <div class="card">
                        <img src="https://localhost/project-rental-mobil/app/img/assets/<?php echo $gambar; ?>" class="card-img-top img-fluid rounded foto-mobil" alt="<?php echo $NoPlat; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $type; ?></h5>
                            <p class="card-text">No Plat: <?php echo $NoPlat; ?></p>
                            <p class="card-text">Status Rental: <?php echo $statusRental; ?></p>
                            <p class="card-text">Harga Sewa: <?php echo $hargaSewa; ?></p>
                            <p class="card-text">Merk: <?php echo $merk; ?></p>
                            <p class="card-text">Type: <?php echo $type; ?></p>
                            <p class="card-text">Transmisi: <?php echo $transmisi; ?></p>
                            <a href="../form/booking_form.php?NoPlat=<?php echo $row['NoPlat']; ?>&IdType=<?php echo $row['IdType']; ?>" class="btn btn-primary" style="background-color: #E57C23; border-color: #E57C23;">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    <!-- End Daftar Mobil -->

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
                            <p>Perum Puri Tamanan Indah , Grojogan Rt.07, Tamanan, Banguntapan, Bantul, Bantul, 55191</p>
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

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
        function checkLogin() {
            var isLoggedIn = <?php echo isset($_SESSION['id']) ? 'true' : 'false'; ?>;
            if (isLoggedIn) {
                window.location.href = "../form/booking_form.php";
            } else {
                alert("Anda harus login atau daftar terlebih dahulu untuk menyewa mobil.");
                window.location.href = "/project-rental-mobil/app/views/auth/login.php";
            }
        }
    </script>
</body>
