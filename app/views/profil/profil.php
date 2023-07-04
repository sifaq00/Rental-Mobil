<?php
include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

// Start session (if not already started)
session_start();

// Check if user ID exists in session
if (isset($_SESSION['nik'])) {
    // Get user ID from session
    $nik = $_SESSION['nik'];

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE NIK = $nik";
    $result = mysqli_query($db, $query);

    // Check if user exists
    if ($result && mysqli_num_rows($result) > 0) {
        if (isset($_SESSION['update_success'])) {
            // Fetch updated user data from the database
            $updatedQuery = "SELECT * FROM users WHERE NIK = $nik";
            $updatedResult = mysqli_query($db, $updatedQuery);

            // Check if updated user data exists
            if ($updatedResult && mysqli_num_rows($updatedResult) > 0) {
                $updatedUser = mysqli_fetch_assoc($updatedResult);

                // Update user data in session
                $user = $updatedUser;
            }

            unset($_SESSION['update_success']);
        }

        $user = mysqli_fetch_assoc($result);
    } else {
        die("User not found.");
    }
} else {
    die("User ID not found in session.");
}

// Handle form submission for updating user data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated user data from the form
    $NIK = $_POST['NIK'];
    $Nama = $_POST['Nama'];
    $NamaUser = $_POST['NamaUser'];
    $Password = $_POST['Password'];
    $JenisKelamin = $_POST['JenisKelamin'];
    $Alamat = $_POST['Alamat'];
    $NoTelp = $_POST['NoTelp'];

    // Update user data in the database
    $updateQuery = "UPDATE users SET NIK = '$NIK', Nama = '$Nama', NamaUser = '$NamaUser', Password = '$Password', JenisKelamin = '$JenisKelamin', Alamat = '$Alamat', NoTelp = '$NoTelp' WHERE NIK = $nik";
    $updateResult = mysqli_query($db, $updateQuery);

    if ($updateResult) {
        // Update successful
        $_SESSION['update_success'] = true;
    } else {
        die("Failed to update user data.");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna | JAVA ELLTRANS Car Rental</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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

    <!-- Profile Section -->
    <section class="container profile">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Profil Pengguna</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="NIK" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="NIK" name="NIK" value="<?php echo isset($updatedUser['NIK']) ? $updatedUser['NIK'] : $user['NIK']; ?>" required>

                            </div>
                            <div class="mb-3">
                                <label for="Nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo isset($updatedUser['Nama']) ? $updatedUser['Nama'] : $user['Nama']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="NamaUser" class="form-label">Email</label>
                                <input type="email" class="form-control" id="NamaUser" name="NamaUser" value="<?php echo isset($updatedUser['NamaUser']) ? $updatedUser['NamaUser'] : $user['NamaUser']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="Password" name="Password" value="<?php echo isset($updatedUser['Password']) ? $updatedUser['Password'] : $user['Password']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="JenisKelamin" name="JenisKelamin" required>
                                    <option value="L" <?php if ($user['JenisKelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                    <option value="P" <?php if ($user['JenisKelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?php echo isset($updatedUser['Alamat']) ? $updatedUser['Alamat'] : $user['Alamat']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="NoTelp" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="NoTelp" name="NoTelp" value="<?php echo isset($updatedUser['NoTelp']) ? $updatedUser['NoTelp'] : $user['NoTelp']; ?>" required>
                            </div>
                            <!-- Add more profile fields as needed -->

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile Section -->


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

    <script>
        <?php if (isset($_SESSION['update_success'])) : ?>
            alert('Profil pengguna berhasil diupdate!');
            <?php unset($_SESSION['update_success']); ?>
        <?php endif; ?>
    </script>

</body>

</html>