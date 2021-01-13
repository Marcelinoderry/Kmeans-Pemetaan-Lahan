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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    // untuk tahun komoditas terbaru
    $(document).ready(function() {
        // untuk highchart
        $.ajax({
            type: 'GET',
            url: '<?= base_url() ?>maps_get_komoditas',
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

        // untuk datable
        $.ajax({
            type: 'GET',
            url: '<?= base_url() ?>maps_get_komoditas_dt',
            dataType: 'json',
            data: {
                kd_kecamatan: '<?= $data->kd_kecamatan ?>',
                tahun: '<?= date('Y') ?>'
            },
            success: function(response) {
                $('#datatabel').DataTable({
                    data: response.data,
                    columns: [{
                            title: 'Perkebunan',
                            data: 'perkebunan',
                            className: 'text-center',
                        },
                        {
                            title: 'Jumlah (Ton)',
                            data: 'jumlah',
                            className: 'text-center',
                        },
                    ],
                });
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

        // untuk higchart
        $.ajax({
            type: 'GET',
            url: '<?= base_url() ?>maps_get_komoditas',
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

        // untuk datable
        $.ajax({
            type: 'GET',
            url: '<?= base_url() ?>maps_get_komoditas_dt',
            dataType: 'json',
            data: {
                kd_kecamatan: kd_kecamatan,
                tahun: tahun
            },
            success: function(response) {
                $('#datatabel').DataTable().clear().destroy();
                $('#datatabel').DataTable({
                    data: response.data,
                    columns: [{
                            title: 'Perkebunan',
                            data: 'perkebunan',
                            className: 'text-center',
                        },
                        {
                            title: 'Jumlah (Ton)',
                            data: 'jumlah',
                            className: 'text-center',
                        },
                    ],
                });
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
                text: 'Basis Data Statistik Perkebunan'
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
                data: data,
                name: 'Population',
                dataSorting: {
                    enabled: true
                },
                zoneAxis: 'x',
                zones: [{
                    value: 1,
                    color: '#ff4d40'
                }],
                dataLabels: {
                    enabled: true,
                    format: '{y:,.2f}'
                },
            }],
            exporting: {
                buttons: {
                    contextButton: {
                        menuItems: ["printChart",
                            "separator",
                            "downloadPNG",
                            "downloadJPEG",
                            "downloadPDF",
                            "downloadSVG",
                            "separator",
                            "downloadCSV",
                            "downloadXLS",
                            "openInCloud"
                        ]
                    }
                }
            }
        });
    }
</script>