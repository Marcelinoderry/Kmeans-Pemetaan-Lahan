<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    // untuk eksekusi data
    var untukEksekusiData = function() {
        $('#form-add').submit(function(e) {
            e.preventDefault();
            $('#inptahun1').attr('required', 'required');
            $('#inptahun2').attr('required', 'required');
            $('#inptahun3').attr('required', 'required');
            if ($('#form-add').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'html',
                    beforeSend: function() {
                        $('#proses').attr('disabled', 'disabled');
                        $('#proses').html('<i class="fa fa-spinner"></i>&nbsp;Menunggu...');
                    },
                    success: function(response) {
                        $('#tampilkan_perhitungan').html(response);
                        $('#proses').removeAttr('disabled');
                        $('#proses').html('<i class="fa fa-cog"></i>&nbsp;Proses');
                    }
                })
            }
        });
    }();
</script>