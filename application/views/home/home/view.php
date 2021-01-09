<header id="header" class="fixed-top header-transparent">
    <div class="container">
        <!-- begin:: navbar -->
        <?php $this->load->view('home/layouts/navbar'); ?>
        <!-- end:: navbar -->
    </div>
</header>

<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang</h2>
                <p class="animate__animated animate__fadeInUp">Kmeans Pemetaan Lahan.</p>
                <a href="<?= base_url() ?>maps" class="btn-get-started animate__animated animate__fadeInUp">Mulai</a>
            </div>
        </div>
    </div>
</section>