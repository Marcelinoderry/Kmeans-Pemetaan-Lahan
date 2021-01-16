<header id="header" class="fixed-top ">
    <div class="container">
        <!-- begin:: navbar -->
        <?php $this->load->view('home/layouts/navbar'); ?>
        <!-- end:: navbar -->
    </div>
</header>

<main id="main">
    <section class="why-us section-bg">
        <div class="container">
            <div class="col-lg-12 d-flex flex-column justify-content-center p-5">
                <!-- begin:: filter -->
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="kecamatan">Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan">
                            <option value="">- Semua -</option>
                            <?php foreach ($kecamatan as $key => $value) : ?>
                                <option value="<?= $value->kd_kecamatan ?>"><?= $value->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="perkebunan">Perkebunan</label>
                        <select class="form-control" name="perkebunan" id="perkebunan">
                            <option value="">- Semua -</option>
                            <?php foreach ($perkebunan as $key => $value) : ?>
                                <option value="<?= $value->kd_perkebunan ?>"><?= $value->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="tahun_awal">Tahun Awal</label>
                        <select class="form-control" name="tahun_awal" id="tahun_awal">
                            <option value="">- Semua -</option>
                            <?php foreach ($tahun as $key => $value) : ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="tahun_akhir">Tahun Akhir</label>
                        <select class="form-control" name="tahun_akhir" id="tahun_akhir">
                            <option value="">- Semua -</option>
                            <?php foreach ($tahun as $key => $value) : ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- end:: filter -->
            </div>
        </div>
    </section>

    <section class="why-us section-bg">
        <div class="container">
            <div class="col-lg-12 d-flex flex-column justify-content-center p-5">
                <!-- begin:: tabel -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="datatabel"></table>
                </div>
                <!-- end:: tabel -->
            </div>
        </div>
    </section>
</main>