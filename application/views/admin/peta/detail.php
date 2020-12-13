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
    </div>
</div>