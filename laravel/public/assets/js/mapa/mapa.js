var map;
var markers;
var infoWindow;
$(document).ready(function () {
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: new google.maps.LatLng("-18", "-50"),
        });

        markers = JSON.parse($("#markers").val());
        //console.log(markers);

        addMarkers(markers);
    }

    function addMarkers(markers){
        for (var i = 0; i < markers.length; i++) {

            var image = {
                url: 'http://www.larchfieldestate.co.uk/wp-content/themes/larchfield/style/images/larchfield_icon_mapmarker.gif',
                size: new google.maps.Size(65, 35),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(33, 33),
                scaledSize: new google.maps.Size(65, 35)
            };

            var contentString = '<div id="content-wrapper">'+
                '<div class="item-title"><h5>'+markers[i].nome+'</h5></div>'+
                '<hr/>'+
                '<p><label>Endereço:</label> '+markers[i].endereco+'</p>'+
                '</div>';

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(markers[i].lat, markers[i].lon),
                title: "#"+markers[i].id.toString(),
                map: map,
                animation: google.maps.Animation.DROP,
                icon: image,
                id: markers[i].id,
                content: contentString
            });

            addInfoWindow(marker);
            //markers.push(marker);
        }
    }

    //click event window
    function addInfoWindow(marker){
        var infoWindow = new google.maps.InfoWindow({
            content: marker.content
        });

        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.open(map, marker);
        });
    }
    initMap();
});