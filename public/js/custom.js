/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    $(document).ready(function () {
        $(".searchbox").on('click', function () {
            var id = $(this).attr('id');
            $("#" + id + "Lat").val('');
            $("#" + id + "Lng").val('');
        });
    });

    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('from'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            $("#fromLat").val(place.geometry.location.lat());
            $("#fromLng").val(place.geometry.location.lng());
            findDuration(null)
        });
    });
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('to'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            $("#toLat").val(place.geometry.location.lat());
            $("#toLng").val(place.geometry.location.lng());
            findDuration(null)
        });
    });
    /*
     * To find duration of different Function for get duration of transport modes
     */
    function findDuration(travelM) {
        if ($('#fromLat').val() && $('#toLat').val()) {
            var origin1 = new google.maps.LatLng($('#fromLat').val(), $('#fromLng').val());
            var origin2 = $('#from').val();
            var destinationA = $('#to').val();
            var destinationB = new google.maps.LatLng($('#toLat').val(), $('#toLat').val());
            if (travelM == null) {
                var travelM = $("#icon .active").attr('id');
            }
            var service = new google.maps.DistanceMatrixService();
            if (travelM == 'walk') {
                travelModeAPI = google.maps.TravelMode.WALKING;
            } else if (travelM == 'bus') {
                travelModeAPI = google.maps.TravelMode.DRIVING;
            }
            else if (travelM == 'transit') {
                travelModeAPI = google.maps.TravelMode.TRANSIT;
            } else {
                travelModeAPI = google.maps.TravelMode.BICYCLING;
            }
            service.getDistanceMatrix(
                    {
                        origins: [origin1, origin2],
                        destinations: [destinationA, destinationB],
                        travelMode: travelModeAPI,
                        unitSystem: google.maps.UnitSystem.IMPERIAL,
                        avoidHighways: false,
                        avoidTolls: false,
                    }, function callback(response, status) {
                if (status == "OK") {
                    console.log(response.rows[0].elements[0].duration.text);
                    $("#icon span").each(function () {
                        $(this).hide();
                    })
                    var durationInMin = Math.floor(response.rows[0].elements[0].duration.value / 60);
                    $("#" + travelM + "+span").text(durationInMin + " MIN").show();

                }

            }
            );
        }

    }
    /*
     * Function for get duration of transport modes 
     */
    $(".travel-mode").on('click', function () {
        var beforeActiveTravelModeId = $("#icon .active").attr('id');
        $("#" + beforeActiveTravelModeId).removeClass('active');
        $(this).addClass('active');
        findDuration($(this).attr('id'));
        //getpodcastData();

    });
    function getpodcastData() {

        $.ajax({
            type: "GET",
            url: "{{ url('/') }}/home/search",
            success: function (data) {
                console.log(data);
            }
        })
    }

