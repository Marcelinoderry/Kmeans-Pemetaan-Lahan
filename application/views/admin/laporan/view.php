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
        <div class="col-sm-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form</h4>
                    </div>
                    <div class="card-block">
                        <!-- begin:: filter -->
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <select class="form-control" name="kecamatan" id="kecamatan">
                                <option value="all">- Semua -</option>
                                <?php foreach ($kecamatan as $key => $value) : ?>
                                    <option value="<?= $value->kd_kecamatan ?>"><?= $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select class="form-control" name="tahun" id="tahun">
                                <option value="">- Pilih -</option>
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value ?>"><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm" type="button" name="print" id="print"><i class="fa fa-print"></i>&nbsp;Cetak</button>
                        </div>
                        <!-- end:: filter -->

                        <!-- begin:: tabel -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="datatabel"></table>
                        </div>
                        <!-- end:: tabel -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>