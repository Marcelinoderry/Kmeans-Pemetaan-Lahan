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
            ajax: {
                url: '<?= admin_url() ?>komoditas/get_data_dt',
                type: 'POST',
                data: function(d) {
                    ($('#kecamatan').val() != '') ? d.kecamatan = $('#kecamatan').val().trim(): '';
                    ($('#perkebunan').val() != '') ? d.perkebunan = $('#perkebunan').val().trim(): '';
                    ($('#tahun').val() != '') ? d.tahun = $('#tahun').val().trim(): '';
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
        $("#tahun").change(function(e) {
            e.preventDefault();
            tabel.ajax.reload();
        });
    }();

    // untuk tambah data
    var untukTambahData = function() {
        $('#form-add').submit(function(e) {
            e.preventDefault();
            $('#inpnama').attr('required', 'required');
            if ($('#form-add').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#add').attr('disabled', 'disabled');
                        $('#add').html('<i class="fa fa-spinner"></i>&nbsp;Waiting...');
                    },
                    success: function(response) {
                        swal({
                                title: response.title,
                                text: response.text,
                                icon: response.type,
                                button: response.button,
                            })
                            .then((value) => {
                                location.reload();
                            });
                    }
                })
            }
        });
    }();

    // untuk get id
    var untukGetIdData = function() {
        $(document).on('click', '#upd', function() {
            var ini = $(this);
            $.ajax({
                type: "post",
                url: "<?= admin_url() ?>perkebunan/get",
                dataType: 'json',
                data: {
                    id: ini.data('id')
                },
                beforeSend: function() {
                    ini.attr('disabled', 'disabled');
                    ini.html('<i class="fas fa-spinner"></i>&nbsp;Waiting...');
                },
                success: function(data) {
                    $('form').attr('action', '<?= admin_url() ?>/perkebunan/upd');
                    $('form').attr('id', 'form-upd');

                    $('#inpidperkebunan').attr('name', 'inpidperkebunan');
                    $('#inpidperkebunan').val(data.id_perkebunan);
                    $('#inpnama').val(data.nama);

                    $('#add').html('<i class="fas fa-save"></i>&nbsp;Simpan');
                    ini.removeAttr('disabled');
                    ini.html('<i class="fas fa-edit"></i>&nbsp;Edit');
                }
            });
        });
    }();

    // untuk ubah data
    var untukUbahData = function() {
        $(document).on('submit', '#form-upd', function(e) {
            e.preventDefault();
            $('#inpnama').attr('required', 'required');
            if ($('#form-upd').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#add').attr('disabled', 'disabled');
                        $('#add').html('<i class="fas fa-spinner"></i>&nbsp;Waiting...');
                    },
                    success: function(data) {
                        swal({
                                title: data.title,
                                text: data.text,
                                icon: data.type,
                                button: data.button,
                            })
                            .then((value) => {
                                location.reload();
                            });
                    }
                })
            }
        });
    }();

    // untuk hapus data
    var untukHapusData = function() {
        $(document).on('click', '#del', function() {
            var ini = $(this);
            swal({
                    title: "Apakah Anda yakin ingin menghapusnya?",
                    text: "Data yang telah dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((del) => {
                    if (del) {
                        $.ajax({
                            type: "post",
                            url: "<?= admin_url() ?>perkebunan/del",
                            dataType: 'json',
                            data: {
                                id: ini.data('id')
                            },
                            beforeSend: function() {
                                ini.attr('disabled', 'disabled');
                                ini.html('<i class="fas fa-spinner"></i>&nbsp;Waiting...');
                            },
                            success: function(data) {
                                swal({
                                        title: data.title,
                                        text: data.text,
                                        icon: data.type,
                                        button: data.button,
                                    })
                                    .then((value) => {
                                        location.reload();
                                    });
                            }
                        });
                    } else {
                        return false;
                    }
                });
        });
    }();
</script>