<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Selamat Datang | <?= $halaman ?></title>
    <link rel="shortcut icon" href="<?= assets_url() ?>map.png">
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

    <script src="<?= assets_url() ?>home/js/jquery/jquery.min.js"></script>
</head>

<body>
    <!-- begin:: content -->
    <?php $this->load->view($content); ?>
    <!-- end:: content -->

    <!-- begin:: footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Alamat</h4>
                        <p>
                            Jl. Poros Polewali Mamasa, <br>
                            Ranterante, Mamasa 91362,<br>
                            Sulawesi Barat
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Telepon</h4>
                        (0411) 402246, 402237
                    </div>
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Email</h4>
                        info@example.com
                    </div>
                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>Sosial Media</h3>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                <a href="https://alanlengkoan.netlify.app/" target="_blank">AL</a> - K-Means Pemetaan Lahan.
            </div>
        </div>
    </footer>
    <!-- end:: footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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
