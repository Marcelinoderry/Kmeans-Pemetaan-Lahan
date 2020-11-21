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
                    <form id="form-add" action="<?= admin_url() ?>perkebunan/add" method="post">
                        <input type="hidden" id="inpidperkebunan">

                        <div class="form-group">
                            <label for="inpnama">Nama *</label>
                            <input type="text" class="form-control" name="inpnama" id="inpnama" placeholder="Masukkan perkebunan">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $rows) : ?>
                                    <tr>
                                        <td align="center"><?= $no++ ?></td>
                                        <td align="center">
                                            <button id="upd" data-id="<?= $rows->id_perkebunan ?>" class="btn btn-primary btn-sm btn-rounded">
                                                <i class="fas fa-edit"></i>&nbsp;Edit
                                            </button>
                                            &nbsp;
                                            <button id="del" data-id="<?= $rows->id_perkebunan ?>" class="btn btn-danger btn-sm btn-rounded">
                                                <i class="fas fa-trash"></i>&nbsp;Hapus
                                            </button>
                                        </td>
                                        <td align="center"><?= $rows->nama ?></td>
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