<header id="header" class="fixed-top ">
    <div class="container">
        <!-- begin:: navbar -->
        <?php $this->load->view('home/layouts/navbar'); ?>
        <!-- end:: navbar -->
    </div>
</header>

<main id="main">
    <section class="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <img src="<?= assets_url() ?>home/images/DPKM.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                  <h2>Motto</h2>
                  <ul>
                    <li><i class="icofont-check-circled"></i> <b>"SMART TANI MAJU"</b> <br> Semangat Melayani Secara Akuntabel, Ramah, Dan Terbuka Menuju Pertanian Yang Maju.</li>
                  </ul>
                  <h2>Visi</h2>
                  <ul>
                    <li><i class="icofont-check-circled"></i> Terwujudnya Pertanian Yang Maju, Produktif Dan Tangguh Sebagai Pilar Utama Pembangunan Ekonomi Daerah.</li>
                  </ul>
                  <h2>Misi</h2>
                  <ul>
                    <li><i class="icofont-check-circled"></i> Membina dan mengembangkan komoditas pertanian/perkebunan yang potensial dan berdaya saing tinggi.</li>
                    <li><i class="icofont-check-circled"></i> Mengoptomalkan pemanfaatan sumber daya lahan dan teknologi pertanian secara berkelanjutan dan berwawasan lingkungan.</li>
                    <li><i class="icofont-check-circled"></i> Meningkatkan kualitas dan kapasitas sumber daya manusia di bidang pertanian baik aparat, petani dan pelaku usaha.</li>
                    <li><i class="icofont-check-circled"></i> Meningkatkan prasarana dan sarana pendukung pembangunan pertanian.</li>
                  </ul>
                </div>
            </div>

        </div>
    </section>

    <section class="facts section-bg">
        <div class="container">
            <div class="row counters">
                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">17</span>
                    <p>Kecamatan</p>
                </div>
                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">19</span>
                    <p>Perkebunan</p>
                </div>
                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">1,463</span>
                    <p>Hours Of Support</p>
                </div>
                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">15</span>
                    <p>Hard Workers</p>
                </div>
            </div>
        </div>
    </section>
</main>
