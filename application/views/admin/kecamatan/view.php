<div class="container">
    <h2><?= $halaman ?></h2>

    <hr />

    <!-- begin:: form -->
    <div class="row">
        <div class="col-lg-12">
            <form id="form-add" action="<?= admin_url() ?>kecamatan/add" method="post">
                <input type="hidden" id="inpidkecamatan">

                <div class="form-group">
                    <label for="inpnama">Nama</label>
                    <input type="text" class="form-control" name="inpnama" id="inpnama" placeholder="Masukkan kecamatan">
                </div>
                <div class="form-group">
                    <label for="inpurl">Url</label>
                    <input type="text" class="form-control" name="inpurl" id="inpurl" placeholder="Masukkan url">
                </div>
                <div class="form-group">
                    <label for="inplatitude">Latitude</label>
                    <input type="text" class="form-control" name="inplatitude" id="inplatitude" placeholder="Masukkan latitude">
                </div>
                <div class="form-group">
                    <label for="inplongitude">Longitude</label>
                    <input type="text" class="form-control" name="inplongitude" id="inplongitude" placeholder="Masukkan longitude">
                </div>
                <div class="form-group">
                    <label for="inpketerangan">Keterangan</label>
                    <textarea class="form-control" name="inpketerangan" id="inpketerangan" placeholder="Masukkan keterangan kecamatan"></textarea>
                </div>
                <button class="btn btn-primary btn-sm" type="submit" name="add" id="add"><i class="fa fa-plus"></i> Add</button>
            </form>
        </div>
    </div>
    <!-- end:: form -->

    <hr />

    <!-- begin:: table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Url</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitude</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data as $rows) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <button id="upd" data-id="<?= $rows->id_kecamatan ?>" class="btn btn-outline-primary btn-sm btn-rounded" style="width: 100%">
                                        <i class="fas fa-edit"></i>&nbsp;Edit
                                    </button>
                                    <div style="padding-top: 5px; padding-bottom: 5px;"></div>
                                    <button id="del" data-id="<?= $rows->id_kecamatan ?>" class="btn btn-outline-danger btn-sm btn-rounded" style="width: 100%">
                                        <i class="fas fa-trash"></i>&nbsp;Hapus
                                    </button>
                                </td>
                                <td><?= $rows->nama ?></td>
                                <td><?= $rows->url ?></td>
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