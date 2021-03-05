<script src="<?= assets_url() ?>admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= assets_url() ?>admin/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= assets_url() ?>admin/assets/pages/data-table/js/jszip.min.js"></script>
<script src="<?= assets_url() ?>admin/assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="<?= assets_url() ?>admin/assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="<?= assets_url() ?>admin/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= assets_url() ?>admin/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= assets_url() ?>admin/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= assets_url() ?>admin/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= assets_url() ?>admin/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    var tabel = null;

    // untuk tabel
    var untukDatatable = function() {
        tabel = $('#datatabel').DataTable({
            responsive: true,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 10,
            search: {
                smart: true
            },
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [
                [3, "desc"]
            ],
            ajax: {
                url: '<?= base_url() ?>komoditas_get_data_dt',
                type: 'POST',
                data: function(d) {
                    ($('#kecamatan').val() != '') ? d.kecamatan = $('#kecamatan').val().trim(): '';
                    ($('#perkebunan').val() != '') ? d.perkebunan = $('#perkebunan').val().trim(): '';
                    ($('#tahun_awal').val() != '') ? d.tahun_awal = $('#tahun_awal').val().trim(): '';
                    ($('#tahun_akhir').val() != '') ? d.tahun_akhir = $('#tahun_akhir').val().trim(): '';
                }
            },
            columns: [{
                    title: 'Kecamatan',
                    data: 'kecamatan',
                    className: 'text-center',
                },
                {
                    title: 'Perkebunan',
                    data: 'perkebunan',
                    className: 'text-center',
                },
                {
                    title: 'Tahun',
                    data: 'tahun',
                    className: 'text-center',
                },
                {
                    title: 'Jumlah (Ton)',
                    data: 'jumlah',
                    className: 'text-center',
                },
            ],
        });
        $("#kecamatan").change(function(e) {
            e.preventDefault();
            tabel.ajax.reload();
        });
        $("#perkebunan").change(function(e) {
            e.preventDefault();
            tabel.ajax.reload();
        });
        $("#tahun_awal").change(function(e) {
            e.preventDefault();
            tabel.ajax.reload();
        });
        $("#tahun_akhir").change(function(e) {
            e.preventDefault();
            tabel.ajax.reload();
        });
    }();
</script>