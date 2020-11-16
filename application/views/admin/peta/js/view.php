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
                        });

                        // event apa bila di click
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                // infowindow.setContent(locations[i][0]);
                                // infowindow.open(map, marker);
                                // alert(locations[i][3]);
                                $('#exampleModal').modal('show')
                            }
                        })(marker, i));
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