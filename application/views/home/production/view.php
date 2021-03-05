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
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <select class="form-control" name="tahun" id="tahun">
                        <option value="">- Semua -</option>
                        <?php foreach ($tahun as $key => $value) : ?>
                            <option value="<?= $value ?>"><?= $value ?></option>
                        <?php endforeach; ?>
                    </select>
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