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
                    <h4>Form</h4>
                </div>
                <div class="card-block">
                    <form id="form-add" action="<?= admin_url() ?>komoditas/upload" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="inpidkecamatan">

                        <div class="form-group">
                            <label for="inpfile">File *</label>
                            <input type="file" class="form-control" name="inpfile" id="inpfile">
                        </div>
                        <button class="btn btn-success btn-sm" type="submit" name="add" id="add"><i class="fa fa-plus"></i> Add</button>
                    </form>
                </div>
            </div>
            <!-- end:: form -->

            <!-- begin:: table -->
            <div class="card">
                <div class="card-header">
                    <h4>Tabel</h4>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatabel">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">
                                        Pilih Semua
                                        <br>
                                        <input type="checkbox" id="pilih_semua">
                                    </th>
                                    <th scope="col" class="text-center">Kecamatan</th>
                                    <th scope="col" class="text-center">Perkebunan</th>
                                    <th scope="col" class="text-center">Bulan</th>
                                    <th scope="col" class="text-center">Tahun</th>
                                    <th scope="col" class="text-center">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end:: table -->
        </div>
    </div>
</div>