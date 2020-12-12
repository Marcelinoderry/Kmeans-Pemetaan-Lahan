<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="<?= assets_url() ?>home/js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= assets_url() ?>home/js/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= assets_url() ?>home/js/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= assets_url() ?>home/js/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= assets_url() ?>home/js/venobox/venobox.css" rel="stylesheet">
    <link href="<?= assets_url() ?>home/js/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= assets_url() ?>home/js/aos/aos.css" rel="stylesheet">
    <link href="<?= assets_url() ?>home/css/style.css" rel="stylesheet">

    <!-- begin:: css local -->
    <?php empty($css) ? '' : $this->load->view($css); ?>
    <!-- end:: css local -->
</head>

<body>
    <header id="header" class="fixed-top header-transparent">
        <div class="container">
            <div class="logo float-left">
                <!-- <h1 class="text-light"><a href="index.html"><span>Pemetaan Lahan</span></a></h1> -->
            </div>

            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.html">Beranda</a></li>
                    <li><a href="tentang.html">Tentang</a></li>
                    <li><a href="statistik.html">Statistik</a></li>
                    <li><a href="<?= login_url() ?>">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Selamat Datang</h2>
                    <p class="animate__animated animate__fadeInUp">Kmeans Pemetaan Lahan.</p>
                    <a href="statistik.html" class="btn-get-started animate__animated animate__fadeInUp">Mulai</a>
                </div>
            </div>

        </div>
    </section>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <script src="<?= assets_url() ?>home/js/jquery/jquery.min.js"></script>
    <script src="<?= assets_url() ?>home/js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= assets_url() ?>home/js/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?= assets_url() ?>home/js/php-email-form/validate.js"></script>
    <script src="<?= assets_url() ?>home/js/venobox/venobox.min.js"></script>
    <script src="<?= assets_url() ?>home/js/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?= assets_url() ?>home/js/counterup/counterup.min.js"></script>
    <script src="<?= assets_url() ?>home/js/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?= assets_url() ?>home/js/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= assets_url() ?>home/js/aos/aos.js"></script>
    <script src="<?= assets_url() ?>home/js/main.js"></script>

    <!-- begin:: js local -->
    <?php empty($js) ? '' : $this->load->view($js); ?>
    <!-- end:: js local -->
</body>

</html>