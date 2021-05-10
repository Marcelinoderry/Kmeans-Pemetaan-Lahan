<header id="header" class="fixed-top ">
    <div class="container">
        <!-- begin:: navbar -->
        <?php $this->load->view('home/layouts/navbar'); ?>
        <!-- end:: navbar -->
    </div>
</header>

<main id="main">
    <!-- begin:: untuk chart -->
    <section class="why-us section-bg">
        <div class="container">
            <div class="col-lg-12 d-flex flex-column justify-content-center p-5">
                <form id="form-add" action="<?= base_url() ?>tahun" method="post">
                    <div class="form-row pb-4">
                        <div class="col">
                            <select class="form-control" name="inptahun1" id="inptahun1">
                                <option value="" selected>- Pilih Tahun 1 -</option>
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row pb-4">
                        <div class="col">
                            <select class="form-control" name="inptahun2" id="inptahun2">
                                <option value="" selected>- Pilih Tahun 2 -</option>
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row pb-4">
                        <div class="col">
                            <select class="form-control" name="inptahun3" id="inptahun3">
                                <option value="" selected>- Pilih Tahun 3 -</option>
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" id="proses">Proses</button>
                </form>
                <!-- begin:: hasil perhitungan -->
                <div id="tampilkan_perhitungan"></div>
                <!-- end:: hasil perhitungan -->
            </div>
        </div>
    </section>
    <!-- end:: untuk chart -->
</main>