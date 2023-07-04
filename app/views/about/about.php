<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Java ELLTRANS Car Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
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

    <!-- About Section -->
    <section class="container about" data-aos="fade-up">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Tentang Javaelltrans Car Rental</h1>
                        <p class="card-text">
                            Javaelltrans Car Rental adalah perusahaan persewaan mobil terkemuka yang menyediakan layanan persewaan mobil berkualitas dengan harga terjangkau.
                        </p>
                        <p class="card-text">
                            Perusahaan kami menawarkan berbagai macam pilihan mobil dari berbagai merek ternama, antara lain city car, group travel vehicle, dan mobil mewah untuk acara-acara khusus seperti pernikahan.
                        </p>
                        <p class="card-text">
                            Kami bangga dengan tim profesional kami dan armada kendaraan yang terawat dengan baik. Layanan pelanggan kami tersedia sepanjang waktu dan dapat dihubungi melalui berbagai saluran, termasuk SMS, WhatsApp, email, atau panggilan telepon langsung.
                        </p>
                        <p class="card-text">
                            Di Javaelltrans Car Rental, kami berusaha untuk memberikan layanan yang luar biasa, memastikan kepuasan pelanggan dan pengalaman sewa mobil yang menyenangkan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="container team" data-aos="fade-up">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-8">
                <h2 class="text-center">Meet Our Team</h2>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="team-member text-center">
                            <img src="https://localhost/project-rental-mobil/app/img/assets/albert.jpg" alt="Albert Aymi pratama Putra" class="team-member-img">
                            <h4 class="mt-3">Albert Aymi Pratama Putra</h4>
                            <p>Front-end Web Developer</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-member text-center">
                            <img src="https://localhost/project-rental-mobil/app/img/assets/sifaq.jpg" alt="Muhammad Asifaq" class="team-member-img">
                            <h4 class="mt-3">Muhammad Asifaq</h4>
                            <p>Full-stack Web Developer</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-member text-center">
                            <img src="https://localhost/project-rental-mobil/app/img/assets/ilyas.jpg" alt="Muhammad Ilyas" class="team-member-img">
                            <h4 class="mt-3">Muhammad Ilyas</h4>
                            <p>Front-end Web Developer</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-member text-center">
                            <img src="https://localhost/project-rental-mobil/app/img/assets/yokofixx.jpg" alt="Yoko Khomarudin H" class="team-member-img">
                            <h4 class="mt-3">Yoko Khomarudin H</h4>
                            <p>Full-stack Web Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



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

     <!-- Scripts -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>