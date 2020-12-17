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
            <!-- begin:: table -->
            <div class="card">
                <div class="card-header">
                    <a href="<?= admin_url() ?>komoditas/unduh" class="btn btn-success btn-sm"><i class="fa fa-download"></i>&nbsp;Unduh</a>
                    <a href="<?= admin_url() ?>komoditas/unggah" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i>&nbsp;Unggah</a>
                </div>
                <div class="card-block">

                    <!-- begin:: filter -->
                    <div class="form-row pb-4">
                        <div class="col">
                            <select class="form-control" name="kecamatan" id="kecamatan">
                                <option value="">- Semua -</option>
                                <?php foreach ($kecamatan as $key => $value) : ?>
                                    <option value="<?= $value->kd_kecamatan ?>"><?= $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="perkebunan" id="perkebunan">
                                <option value="">- Semua -</option>
                                <?php foreach ($perkebunan as $key => $value) : ?>
                                    <option value="<?= $value->kd_perkebunan ?>"><?= $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="tahun" id="tahun">
                                <option value="">- Semua -</option>
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- end:: filter -->

                    <!-- begin:: tabel -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatabel"></table>
                    </div>
                    <!-- end:: tabel -->
                </div>
            </div>
            <!-- end:: table -->
        </div>
    </div>
</div>