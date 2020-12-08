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

    // untuk tambah data
    var untukTambahData = function() {
        var parsleyConfig = {
            errorsContainer: function(parsleyField) {
                var $err = parsleyField.$element.siblings('#error');
                return $err;
            }
        }

        $('#form-add').parsley(parsleyConfig);

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
                            columns: [
                                {
                                    data: null,
                                    render: function(data, type, row) {
                                        return ` <input type="checkbox" class="pilih" data-kecamatan="` + row.kecamatan + `"> `;
                                    },
                                },
                                {
                                    data: 'kecamatan'
                                },
                                {
                                    data: 'perkebunan'
                                },
                                {
                                    data: 'bulan'
                                },
                                {
                                    data: 'tahun'
                                },
                                {
                                    data: 'hasil'
                                }
                            ]
                        });
                        // swal({
                        //         title: response.title,
                        //         text: response.text,
                        //         icon: response.type,
                        //         button: response.button,
                        //     })
                        //     .then((value) => {
                        //         location.reload();
                        //     });
                    }
                })
            }
        });
    }();
</script>