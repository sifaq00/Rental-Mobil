<?php
require_once __DIR__ . '/../../config/database.php';

// Inisialisasi variabel $nik
$nik = "";

// Simpan NIK pengguna dalam sesi
$_SESSION["nik"] = $nik;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center"> <!-- Added text-center class -->
                    <a class="navbar-brand" href="#"> <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../home/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about/about.php">About</a>
                    </li>
                </ul>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="login.php" class="btn me-md-2 text-white" type="button" style="background-color: #E57C23;">Login</a>
                <a href="../auth/registration.php" class="btn text-white me-md-5" type="button" style="background-color: #E57C23;">Register</a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Login Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <h2 class="text-center">Login</h2>
                <form method="POST" action="login.php">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Mengambil nilai yang dikirim dari form login
                        $NamaUser = $_POST["NamaUser"];
                        $Password = $_POST["Password"];

                        // Membuat koneksi ke database
                        $servername = "localhost";
                        $username_db = "root";
                        $password_db = "";
                        $database = "rental_mobil";

                        $conn = new mysqli($servername, $username_db, $password_db, $database);

                        // Memeriksa koneksi database
                        if ($conn->connect_error) {
                            die("Koneksi database gagal: " . $conn->connect_error);
                        }

                        // Menggunakan prepared statement untuk mencegah SQL injection
                        $stmt = $conn->prepare("SELECT NIK, role FROM viewusers WHERE NamaUser = ? AND Password = ?");
                        $stmt->bind_param("ss", $NamaUser, $Password);
                        $stmt->execute();
                        $stmt->bind_result($nik, $role);

                        // Memeriksa apakah pengguna ditemukan
                        if ($stmt->fetch()) {
                            // Jika pengguna ditemukan, simpan role dan NIK ke dalam session
                            session_start();
                            $_SESSION["role"] = $role;
                            $_SESSION["nik"] = $nik;

                            // Redirect pengguna ke halaman yang sesuai dengan peran (role) mereka
                            if ($role == "Admin") {
                                header("Location: ../admin/dashboard.php"); // Ganti dengan halaman dashboard admin
                                exit();
                            } elseif ($role == "Pelanggan") {
                                header("Location: ../pelanggan/daftar-mobil.php"); // Ganti dengan halaman dashboard user
                                exit();
                            }
                        } else {
                            $error = "Username atau password salah.";
                        }

                        // Menutup koneksi database
                        $stmt->close();
                        $conn->close();
                    }
                    ?>

                    <div class="mb-3">
                        <label for="NamaUser">Email</label>
                        <input class="form-control" type="email" name="NamaUser" id="NamaUser" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password">Password</label>
                        <input class="form-control" type="Password" name="Password" id="Password" required>
                    </div>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Login Form -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>