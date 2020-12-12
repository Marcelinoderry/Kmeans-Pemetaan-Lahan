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
    $('#datatabel').DataTable({
        ordering: false,
    });

    // apabila dicentang semua
    var untukCentangSemua = function() {
        $(document).on('click', '#pilih_semua', function() {
            var checked = $('.pilih');

            if (checked.not(this).prop('checked', this.checked).is(':checked')) {
                checked.not(this).prop('checked', true);
            } else {
                checked.not(this).prop('checked', false);
            }
        });
    }();

    // untuk import data
    var untukImportData = function() {
        $('#form-add').submit(function(e) {
            e.preventDefault();

            $('#inpfile').attr('required', 'required');

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
                        if ($.fn.DataTable.isDataTable('#datatabel')) {
                            $('#datatabel').DataTable().destroy();
                        }

                        $('#datatabel').DataTable({
                            data: response.data,
                            paging: false,
                            columns: [{
                                    data: null,
                                    className: 'text-center',
                                    orderable: false,
                                    render: function(data, type, row) {
                                        return ` <input type="checkbox" class="pilih" data-kd_kecamatan="` + row.kd_kecamatan + `"  data-kd_perkebunan="` + row.kd_perkebunan + `"  data-tahun="` + row.tahun + `"  data-jumlah="` + row.jumlah + `"> `;
                                    },
                                },
                                {
                                    data: 'kecamatan'
                                },
                                {
                                    data: 'perkebunan'
                                },
                                {
                                    data: 'tahun'
                                },
                                {
                                    data: 'jumlah'
                                }
                            ]
                        });
                        $('#save').removeAttr('disabled');
                        $('#add').removeAttr('disabled');
                        $('#add').html('<i class="fa fa-file-import"></i>&nbsp;Import');
                    }
                })
            }
        });
    }();

    // untuk simpan data yang dipilih
    var untukSimpanData = function() {
        $(document).on('click', '#save', function(e) {
            var centang = $('.pilih:checked');

            if (centang.length > 0) {
                // apabila data dicentang
                var data = [];

                $(centang).each(function() {
                    var ini = $(this);

                    var get = [
                        ini.data('kd_kecamatan'),
                        ini.data('kd_perkebunan'),
                        ini.data('tahun'),
                        ini.data('jumlah'),
                    ];

                    data.push(get);
                });

                $.ajax({
                    method: 'POST',
                    url: "<?= admin_url() ?>komoditas/simpan",
                    dataType: 'json',
                    data: {
                        data: JSON.stringify(data)
                    },
                    beforeSend: function() {
                        $('#simpan').attr('disabled', 'disabled');
                        $('#simpan').html('<i class="icon-spinner icon-spin"></i> Tunggu...');
                        $.blockUI({
                            message: "<h5>Menunggu...</h5>"
                        }, {
                            css: {
                                border: 'none',
                                padding: '15px',
                                backgroundColor: '#000',
                                '-webkit-border-radius': '10px',
                                '-moz-border-radius': '10px',
                                opacity: .5,
                                color: '#fff'
                            }
                        });
                    },
                    success: function(response) {
                        if (response.status == true) {
                            $.unblockUI();
                            alert(response.msg);
                            window.location = '<?= admin_url() ?>/komoditas'
                        } else {
                            $.gritter.add({
                                title: 'Info..!!',
                                text: response.msg,
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr + ' ' + ajaxOptions + '' + thrownError);
                    }
                });
            } else {
                // apabila pada data penyakit tidak ada yang dicentang
                $.gritter.add({
                    title: 'Peringatan..!!',
                    text: 'Belum ada data yang dipilih!',
                });
            }
        });
    }();
</script>