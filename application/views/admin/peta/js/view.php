<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-JpweDJ7_cA9-KiEq-iMjQzlluOemnWo&callback=initMap"></script>

<script>
    // untuk get data peta
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: '<?= admin_url() ?>peta/get_peta',
            dataType: 'json',
            success: function(response) {
                initMap(response);
                // untuk google maps
                function initMap(locations) {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 10,
                        center: new google.maps.LatLng(-2.871569, 119.276926),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    var infowindow = new google.maps.InfoWindow();
                    var marker, i;
                    for (i = 0; i < locations.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                            map: map,
                            animation: google.maps.Animation.DROP,
                            title: locations[i].nama,
                            icon: {
                                url: "<?= assets_url() ?>pin.png",
                                labelOrigin: new google.maps.Point(10, 40),
                                scaledSize: new google.maps.Size(25, 35),
                            },
                            label: {
                                color: '#000',
                                fontWeight: 'bold',
                                fontSize: '10px',
                                text: locations[i].nama
                            }
                        });
                        // event apa bila di click
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                var kd_kecamatan = locations[i].kd_kecamatan;
                                $.ajax({
                                    type: 'GET',
                                    url: '<?= admin_url() ?>peta/get_peta_rincian',
                                    dataType: 'html',
                                    data: {
                                        kd_kecamatan: kd_kecamatan,
                                    },
                                    success: function(response) {
                                        $('.modal-body').html(response);

                                        $('#exampleModal').modal('show');
                                    },
                                    error: function(xhr, ajaxOptions, thrownError) {
                                        var errorMsg = 'Request Ajax Gagal : ' + xhr.responseText;
                                        alert(errorMsg);
                                    }
                                });
                            }
                        })(marker, i));

                        // untuk menampilka garis atau ppolygon
                        var parsePolygon = JSON.parse(locations[i].polygon);

                        const flightPath = new google.maps.Polyline({
                            path: parsePolygon,
                            geodesic: true,
                            strokeColor: "#FF0000",
                            strokeOpacity: 1.0,
                            strokeWeight: 2,
                        });

                        flightPath.setMap(map);
                    }
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var errorMsg = 'Request Ajax Gagal : ' + xhr.responseText;
                alert(errorMsg);
            }
        });
    });
</script>