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
    // untuk tabel
    $('#datatabel').DataTable();

    // untuk tambah data
    var untukTambahData = function() {
        $('#form-add').submit(function(e) {
            e.preventDefault();
            $('#inpnama').attr('required', 'required');
            $('#inpurl').attr('required', 'required');
            $('#inpluslan').attr('required', 'required');
            $('#inplatitude').attr('required', 'required');
            $('#inplongitude').attr('required', 'required');
            $('#inpketerangan').attr('required', 'required');
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
                url: "<?= admin_url() ?>kecamatan/get",
                dataType: 'json',
                data: {
                    id: ini.data('id')
                },
                beforeSend: function() {
                    ini.attr('disabled', 'disabled');
                    ini.html('<i class="fas fa-spinner"></i>&nbsp;Waiting...');
                },
                success: function(data) {
                    $('form').attr('action', '<?= admin_url() ?>/kecamatan/upd');
                    $('form').attr('id', 'form-upd');
                    $('#inpidkecamatan').attr('name', 'inpidkecamatan');
                    $('#inpidkecamatan').val(data.id_kecamatan);
                    $('#inpkode').val(data.kd_kecamatan);
                    $('#inpnama').val(data.nama);
                    $('#inpurl').val(data.url);
                    $('#inpluslan').val(data.luas_lahan);
                    $('#inplatitude').val(data.latitude);
                    $('#inplongitude').val(data.longitude);
                    $('#inpketerangan').val(data.keterangan);
                    $('#add').html('<i class="fas fa-plus"></i>&nbsp;Simpan');
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
            $('#inpurl').attr('required', 'required');
            $('#inpluslan').attr('required', 'required');
            $('#inplatitude').attr('required', 'required');
            $('#inplongitude').attr('required', 'required');
            $('#inpketerangan').attr('required', 'required');
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
                            url: "<?= admin_url() ?>kecamatan/del",
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