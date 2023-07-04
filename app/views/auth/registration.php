<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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
        <a href="../auth/login.php" class="btn me-md-2 text-white" type="button" style="background-color: #E57C23;">Login</a>
        <a href="../auth/registration.php" class="btn text-white me-md-5" type="button" style="background-color: #E57C23;">Register</a>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Register Form -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <h2 class="text-center">Register</h2>
        <form method="POST" action="./register.php">
          <div class="mb-3">
            <label for="Nama" class="form-label">Nama Lengkap</label>
            <input class="form-control" type="text" name="Nama" id="Nama" autocomplete="off" autofocus required>
          </div>
          <div class="mb-3">
            <label for="NIK">Nomor Induk Kependudukan</label>
            <input class="form-control" type="number" name="NIK" id="NIK" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="NamaUser">Email</label>
            <input class="form-control" type="email" name="NamaUser" id="NamaUser" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="Password">Password</label>
            <input class="form-control" type="Password" name="Password" id="Password" required>
          </div>
          <div class="mb-3">
            <label for="Password2">Ulangi Password</label>
            <input class="form-control" type="Password" name="Password2" id="Password2" required>
          </div>
          <div class="mb-3">
            <label for="JenisKelamin">Jenis Kelamin</label>
            <select class="browser-default custom-select" name="JenisKelamin" id="JenisKelamin">
              <option value="" selected>Pilih jenis Kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="Alamat">Alamat</label>
            <textarea class="form-control" type="number" name="Alamat" id="Alamat" autocomplete="off"></textarea>
          </div>
          <div class="mb-3">
            <label for="NoTelp">No Telepon</label>
            <input class="form-control telp" type="text" name="NoTelp" id="NoTelp" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="Role">Role</label>
            <select class="form-control" name="RoleId" id="RoleId" readonly>
              <option value="3" selected>Pelanggan</option>
            </select>
          </div>

          <br>
          <button type="submit" value="Simpan" name="simpan" class="btn btn-primary mb-5">Register</button>
        </form>

      </div>
    </div>
  </div>
  <!-- End Register Form -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>