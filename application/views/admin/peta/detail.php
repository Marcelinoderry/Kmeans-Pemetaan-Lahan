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
            <!-- begin:: form -->
            <div class="card">
                <div class="card-header">
                    <h4><?= $data->nama ?></h4>
                </div>
                <div class="card-block">
                    <!-- begin:: filter -->
                    <div class="form-row pb-4">
                        <div class="col">
                            <select class="form-control" name="tahun" id="tahun">
                                <option value="<?= date('Y') ?>" selected><?= date('Y') ?></option>
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value->tahun ?>" data-kd_kecamatan="<?= $data->kd_kecamatan ?>"><?= $value->tahun ?></option>
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
            <!-- end:: form -->
        </div>
    </div>
</div>