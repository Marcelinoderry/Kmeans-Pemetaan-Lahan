<header id="header" class="fixed-top ">
    <div class="container">
        <!-- begin:: navbar -->
        <?php $this->load->view('home/layouts/navbar'); ?>
        <!-- end:: navbar -->
    </div>
</header>

<main id="main">
    <section class="map">
        <!-- begin:: untuk google maps -->
        <div id="map" style="height: 600px; width: 100%;"></div>
        <!-- end:: untuk google maps -->
    </section>
</main>

<!-- begin:: untuk modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Kecamatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- isi detail -->
            </div>
        </div>
    </div>
</div>
<!-- end:: untuk modal -->