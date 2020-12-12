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
                    <h5>Form</h5>
                </div>
                <div class="card-block">
                    <form id="form-add" action="<?= admin_url() ?>profil/upd" method="post">
                        <input type="hidden" name="inpidusers" id="inpidusers" value="<?= $data->id ?>">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama *</label>
                            <div class="col-sm-10">
                                <input type="text" name="inpnama" id="inpnama" class="form-control" value="<?= $data->name ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email *</label>
                            <div class="col-sm-10">
                                <input type="email" name="inpemail" id="inpemail" class="form-control" value="<?= $data->email ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username *</label>
                            <div class="col-sm-10">
                                <input type="text" name="inpusername" id="inpusername" class="form-control" value="<?= $data->username ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-fade fade-in-primary d-">
                                <label>
                                    <input type="checkbox" name="ubahpassword" id="ubahpassword" />
                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                    <span class="text-inverse">Ubah password.</span>
                                </label>
                            </div>
                        </div>
                        <div id="addpassword">
                        </div>
                        <button type="submit" name="add" id="add" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Upd</button>
                    </form>
                </div>
            </div>
            <!-- end:: form -->
        </div>
    </div>
</div>