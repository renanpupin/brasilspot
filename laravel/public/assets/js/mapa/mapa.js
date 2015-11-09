alert();
var map;
var marker;
var infoWindow;
$(document).ready(function () {
    function initMap(centerLat, centerLon) {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: new google.maps.LatLng(centerLat, centerLon),
        });

        var geocoder = new google.maps.Geocoder();

        document.getElementById('pesquisar').addEventListener('click', function () {
            geocodeAddress(geocoder, map);
        });

        map.addListener('click', function (e) {
            addMarker(map, "", e.latLng);
        });
    }

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
                addMarker(resultsMap, address, results[0].geometry.location);
            } else {
                //alert('Geocode was not successful for the following reason: ' + status);
                if (status == "ZERO_RESULTS") {
                    alert("Não Foram Encontrados resultados para a pesquisa!");
                } else {
                    alert("Ocorreu um erro inesperado, reporte para a central que resolveremos o mais rápido possível!");
                }
            }
        });
    }

    function addMarker(resultsMap, address, location) {
        if (marker) {
            infoWindow.close();
            marker.setPosition(location);
            marker.content = "<h4>" + address + "</h4><p>Latitude: " + location.lat() + "</p><p>Logintude: " + location.lng() + "</p>";
            infoWindow = new google.maps.InfoWindow({
                content: marker.content
            });

            infoWindow.open(resultsMap, marker);
        } else {
            marker = new google.maps.Marker({
                map: resultsMap,
                position: location,
                content: "<h4>" + address + "</h4><p>Latitude: " + location.lat() + "</p><p>Logintude: " + location.lng() + "</p>"
            });
            infoWindow = new google.maps.InfoWindow({
                content: marker.content
            });

            infoWindow.open(resultsMap, marker);

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(resultsMap, marker);
            });
        }
        resultsMap.setZoom(15);
    }
    initMap(-15.1, -51.918921);
});