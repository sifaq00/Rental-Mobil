<?php include("/xampp/htdocs/project-rental-mobil/app/config/database.php");


$sql = "SELECT m.*, merk.NmMerk, type.NmType FROM mobil m 
        JOIN merk ON m.KdMerk = merk.KdMerk 
        JOIN type ON m.IdType = type.IdType";
$result = mysqli_query($db, $sql);



?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <title>JAVA ELLTRANS Car Rental</title>
</head>


<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center"> <!-- Added text-center class -->
                    <a class="navbar-brand" href="#"> <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" href="../home/index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>" href="../about/about.php">Tentang Kami</a>
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

    <!-- Jumbotron -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3" style="color:#E8AA42">JAVA ELLTRANS <br> Car Rental</h1>
            <p class="lead">Jelajahi kebebasan dengan menyewa mobil berkualitas tinggi
                <br>
                 dan penuh kenyamanan dengan harga yang tak akan menguras kantong Anda!</p>
        </div>
    </div>

    <!-- Kenapa Memilih Kami -->
    <section class="container reason" data-aos="fade-up" data-aos-duration="1000">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h1 class="card-title">Kenapa Memilih Kami?</h1>
                        <div class="row">
                            <div class="col-lg-4 mt-5">
                                <div class="card-text">
                                    <img src="https://localhost/project-rental-mobil/app/img/assets/harga terjangkau.png" alt="">
                                    <h3>Harga Terjangkau</h3>
                                    <p class="card-text">Kami menyediakan berbagai pilihan mobil dengan berbagai jenis dan merk terkemuka.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-5">
                                <div class="card-text">
                                    <img src="https://localhost/project-rental-mobil/app/img/assets/pelayanan.png" alt="">
                                    <h3>Pelayanan Prima</h3>
                                    <p class="card-text">Costumer sevice kami siap melayani Anda kapan pun. Dan siap dengan media apapun, mulai dari via SMS, Whatsapp, E-mail, maupun telepon secara langsung.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-5">
                                <div class="card-text">
                                    <img src="https://localhost/project-rental-mobil/app/img/assets/kualitas.png" alt="">
                                    <h3>Kualitas Terbaik</h3>
                                    <p class="card-text">Perusahaan kami didukung dengan tim yang profesional dan dikelola oleh SDM pilihan serta unit mobil yang variatif, mulai dari city car, sampai mobil rombongan dan mobil mewah untuk pengantin.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Daftar Mobil -->

    <section class="container car-collection" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-center pb-3">Koleksi Mobil Kami</h2>
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
                            <p class="card-text">Status Rental: <?php echo $statusRental; ?></p>
                            <p class="card-text">Harga Sewa: <?php echo $hargaSewa; ?></p>
                            <p class="card-text">Merk: <?php echo $merk; ?></p>
                            <p class="card-text">No Plat: <?php echo $NoPlat; ?></p>
                            <p class="card-text">Transmisi: <?php echo $transmisi; ?></p>
                            <?php
                            // Check if the user is logged in
                            if (isset($_SESSION["user_id"])) {
                                echo '<a href="../form/booking_form.php" class="btn btn-primary btn-booking">Sewa Sekarang</a>';
                            } else {
                                echo '<a href="../auth/login.php" class="btn btn-primary btn-booking" onclick="showLoginAlert()">Sewa Sekarang</a>';
                            }
                            ?>
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
                            <p>Perum Puri Tamanan Indah , Grojogan Rt.07, Tamanan, Banguntapan, Bantul, DIY, 55191</p>
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
    function showLoginAlert() {
        alert("Anda harus login terlebih dahulu untuk melakukan pemesanan.");
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>



</body>