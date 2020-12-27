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
                    <form id="form-add" action="<?= admin_url() ?>kecamatan/add" method="post">
                        <input type="hidden" id="inpidkecamatan">

                        <div class="form-group">
                            <label for="inpkode">Kode</label>
                            <input type="text" class="form-control" name="inpkode" id="inpkode" value="<?= get_kode_urut('tb_kecamatan', 'KEC') ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="inpnama">Nama *</label>
                            <input type="text" class="form-control" name="inpnama" id="inpnama" placeholder="Masukkan kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="inpurl">Url *</label>
                            <input type="text" class="form-control" name="inpurl" id="inpurl" placeholder="Masukkan url">
                        </div>
                        <div class="form-group">
                            <label for="inpluslan">Luas Lahan *</label>
                            <input type="text" class="form-control" name="inpluslan" id="inpluslan" placeholder="Masukkan luas lahan">
                        </div>
                        <div class="form-group">
                            <label for="inplatitude">Latitude *</label>
                            <input type="text" class="form-control" name="inplatitude" id="inplatitude" placeholder="Masukkan latitude">
                        </div>
                        <div class="form-group">
                            <label for="inplongitude">Longitude *</label>
                            <input type="text" class="form-control" name="inplongitude" id="inplongitude" placeholder="Masukkan longitude">
                        </div>
                        <div class="form-group">
                            <label for="inpketerangan">Keterangan *</label>
                            <textarea class="form-control" name="inpketerangan" id="inpketerangan" placeholder="Masukkan keterangan kecamatan"></textarea>
                        </div>
                        <button class="btn btn-success btn-sm" type="submit" name="add" id="add"><i class="fa fa-plus"></i> Add</button>
                    </form>
                </div>
            </div>
            <!-- end:: form -->

            <!-- begin:: table -->
            <div class="card">
                <div class="card-header">
                    <h4>Table</h4>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatabel">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Luas Lahan</th>
                                    <th scope="col">Latitude</th>
                                    <th scope="col">Longitude</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $rows) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <button id="upd" data-id="<?= $rows->id_kecamatan ?>" class="btn btn-primary btn-sm btn-rounded">
                                                <i class="fas fa-edit"></i>&nbsp;Edit
                                            </button>
                                            &nbsp;
                                            <button id="del" data-id="<?= $rows->id_kecamatan ?>" class="btn btn-danger btn-sm btn-rounded">
                                                <i class="fas fa-trash"></i>&nbsp;Hapus
                                            </button>
                                        </td>
                                        <td><?= $rows->nama ?></td>
                                        <td><?= $rows->url ?></td>
                                        <td><?= $rows->luas_lahan ?></td>
                                        <td><?= $rows->latitude ?></td>
                                        <td><?= $rows->longitude ?></td>
                                        <td><?= $rows->keterangan ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end:: table -->
        </div>
    </div>
</div>