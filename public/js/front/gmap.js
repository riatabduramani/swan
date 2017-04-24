var myCenter = new google.maps.LatLng(42.094429, 21.072779);

function initialize() {
    var mapProp = {
        center: myCenter,
        scrollwheel: false,
        zoom: 16,
        zoomControl: true,
        mapTypeControl: true,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.HYBRID,
        styles: [{
            "featureType": "landscape",
            "stylers": [{
                "color": "#f2f2f2"
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "poi",
            "stylers": [{
                "saturation": -100
            }, {
                "lightness": 51
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "road.highway",
            "stylers": [{
                "color": "#f2f2f2"
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "road.arterial",
            "stylers": [{
                "color": "#f2f2f2"
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "road.local",
            "stylers": [{
                "color": "#14adf4"
            }, {
                "visibility": "off"
            }]
        }, {
            "featureType": "transit",
            "stylers": [{
                "saturation": -100
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "administrative.province",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#f9bf3b"
            }]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#14adf4"
            }, {
                "visibility": "on"
            }]
        }]
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    var marker = new google.maps.Marker({
        position: myCenter,
          icon:'5485454543515554.png'

    });




}

google.maps.event.addDomListener(window, 'load', initialize);