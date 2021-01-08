<header id="header" class="fixed-top ">
    <div class="container">
        <!-- begin:: navbar -->
        <?php $this->load->view('home/layouts/navbar'); ?>
        <!-- end:: navbar -->
    </div>
</header>

<main id="main">
    <!-- begin:: untuk detail -->
    <section class="why-us section-bg">
        <div class="container">
            <div class="col-lg-12 d-flex flex-column justify-content-center p-5">
                <div class="icon-box">
                    <div class="icon"><i class='bx bxs-disc'></i></div>
                    <h4 class="title">Luas Lahan</h4>
                    <p class="description"><?= ($data->luas_lahan == '' ? '-' : $data->luas_lahan) ?></p>
                </div>
                <div class="icon-box">
                    <div class="icon"><i class='bx bxs-disc'></i></div>
                    <h4 class="title">Keterangan</h4>
                    <p class="description"><?= ($data->keterangan == '' ? '-' : $data->keterangan) ?></p>
                </div>
                <div class="icon-box">
                    <div class="icon"><i class='bx bxs-disc'></i></div>
                    <h4 class="title">Latitude</h4>
                    <p class="description"><?= $data->latitude ?></p>
                </div>
                <div class="icon-box">
                    <div class="icon"><i class='bx bxs-disc'></i></div>
                    <h4 class="title">Longitude</h4>
                    <p class="description"><?= $data->longitude ?></p>
                </div>

                <?= htmlspecialchars_decode(stripslashes($data->url)) ?>
            </div>
        </div>
    </section>
    <!-- end:: untuk detail -->

    <!-- begin:: untuk chart -->
    <section class="why-us section-bg">
        <div class="container">
            <div class="col-lg-12 d-flex flex-column justify-content-center p-5">
                <!-- begin:: filter -->
                <div class="form-row pb-4">
                    <div class="col">
                        <select class="form-control" name="tahun" id="tahun">
                            <option value="<?= date('Y') ?>" selected><?= date('Y') ?></option>
                            <?php foreach ($tahun as $key => $value) : ?>
                                <option value="<?= $value->tahun ?>" data-kd_kecamatan="<?= $data->kd_kecamatan ?>">
                                    <?= $value->tahun ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- end:: filter -->

                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
            </div>
        </div>
    </section>
    <!-- end:: untuk chart -->
</main>