<?php
session_start();
include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

// Periksa apakah pelanggan sudah login atau belum, jika belum, arahkan ke halaman login
if (!isset($_SESSION['id'])) {
    header("Location: /project-rental-mobil/app/views/auth/login.php");
    exit();
}

$sql = "SELECT m.*, merk.NmMerk, type.NmType FROM mobil m 
        JOIN merk ON m.KdMerk = merk.KdMerk 
        JOIN type ON m.IdType = type.IdType";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Rental Mobil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <a class="navbar-brand" href="#"> <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Daftar Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pelanggan/riwayat_transaksi.php">Riwayat Transaksi</a>
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
        <!-- Isi bagian footer sesuai dengan kebutuhan -->
    </footer>
    <!-- End Footer -->

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
