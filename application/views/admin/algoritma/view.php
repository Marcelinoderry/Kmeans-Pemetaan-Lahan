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
            <!-- begin:: form -->
            <div class="card">
                <div class="card-header">
                    <h4>Pilih Tahun</h4>
                </div>
                <div class="card-block">
                    <form id="form-add" action="<?= admin_url() ?>algoritma/tahun" method="post">
                        <div class="form-group">
                            <label for="inptahun1">Tahun 1</label>
                            <select class="form-control" name="inptahun1" id="inptahun1">
                                <option value="">- Pilih Tahun -</option>
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inptahun2">Tahun 2</label>
                            <select class="form-control" name="inptahun2" id="inptahun2">
                                <option value="">- Pilih Tahun -</option>
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inptahun3">Tahun 2</label>
                            <select class="form-control" name="inptahun3" id="inptahun3">
                                <option value="">- Pilih Tahun -</option>
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button class="btn btn-success btn-sm" type="submit" name="proses" id="proses"><i class="fa fa-cog"></i>&nbsp;Proses</button>
                    </form>
                </div>
            </div>
            <!-- end:: form -->

            <!-- begin:: hasil perhitungan -->
            <div id="tampilkan_perhitungan"></div>
            <!-- end:: hasil perhitungan -->
        </div>
    </div>
</div>