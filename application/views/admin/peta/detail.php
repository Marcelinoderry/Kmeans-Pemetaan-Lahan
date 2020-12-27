<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4><?= $halaman ?></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#!"><?= $halaman ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <!-- begin:: detail & peta -->
            <div class="card">
                <div class="card-header">
                    <h4><?= $data->nama ?></h4>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="inpluslan" class="col-sm-6 col-form-label">Luas Lahan</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="inpluslan" value="<?= ($data->luas_lahan == '' ? '-' : $data->luas_lahan) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inpketeranagan" class="col-sm-6 col-form-label">Keterangan</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="inpketeranagan" value="<?= ($data->keterangan == '' ? '-' : $data->keterangan) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="inplatitude" class="col-sm-6 col-form-label">Latitude</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="inplatitude" value="<?= $data->latitude ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inplongitude" class="col-sm-6 col-form-label">Longitude </label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="inplongitude" value="<?= $data->longitude ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <?= htmlspecialchars_decode(stripslashes($data->url)) ?>
                </div>
            </div>
            <!-- end:: detail & peta -->
            <!-- begin:: chart -->
            <div class="card">
                <div class="card-block">
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
            <!-- end:: chart -->
        </div>
    </div>
</div>