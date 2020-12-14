<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    // untuk tahun komoditas terbaru
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: '<?= admin_url() ?>peta/get_komoditas',
            dataType: 'json',
            data: {
                kd_kecamatan: '<?= $data->kd_kecamatan ?>',
                tahun: '<?= date('Y') ?>'
            },
            success: function(response) {
                getChart(response.data, response.tahun);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var errorMsg = 'Request Ajax Gagal : ' + xhr.responseText;
                alert(errorMsg);
            }
        });
    });

    // untuk filter tahun
    $('#tahun').on('change', function() {
        var kd_kecamatan = $(this).find(':selected').data('kd_kecamatan');
        var tahun = $(this).val();

        $.ajax({
            type: 'GET',
            url: '<?= admin_url() ?>peta/get_komoditas',
            dataType: 'json',
            data: {
                kd_kecamatan: kd_kecamatan,
                tahun: tahun
            },
            success: function(response) {
                getChart(response.data, response.tahun);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var errorMsg = 'Request Ajax Gagal : ' + xhr.responseText;
                alert(errorMsg);
            }
        });
    });

    function getChart(data, tahun) {
        Highcharts.chart('container', {
            chart: {
                type: 'column',
            },
            title: {
                text: 'Hasil Komoditas pada tahun ' + tahun
            },
            subtitle: {
                text: 'Badan Pusat Statistik'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Hasil Jumlah (ton)'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Hasil panen perkebunan pada ' + tahun + ': <b>{point.y:.1f} ton</b>'
            },
            series: [{
                name: 'Population',
                data: data,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y:.1f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    }
</script>