<!-- begin:: style -->
<style>
    iframe {
        width: 100%;
    }
</style>
<!-- end:: style -->

<div class="row">
    <div class="col-lg-12">
        <h2><?= $kecamatan->nama ?></h2>

        <?= htmlspecialchars_decode(stripslashes($kecamatan->url)) ?>

        <a href="<?= admin_url() ?>peta/detail/<?= $kecamatan->kd_kecamatan ?>" class="btn btn-success btn-sm"><i class="fa fa-info"></i>&nbsp;Detail</a>
    </div>
</div>