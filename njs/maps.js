 google.maps.event.addDomListener(window, 'load', init);

        function init() {
            var mapOptions = {
                zoom: 11,
                scrollwheel: false,
                mapTypeControl: false,
                zoomControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                center: new google.maps.LatLng(23.810332, 90.41251809999994),
                styles: [{
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "gamma": 1
                    }]
                }, {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "poi.business",
                    "elementType": "labels.text",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "poi.business",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "poi.place_of_worship",
                    "elementType": "labels.text",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "poi.place_of_worship",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "water",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "saturation": 50
                    }, {
                        "gamma": 0
                    }, {
                        "hue": "#96b6ce"
                    }]
                }, {
                    "featureType": "administrative.neighborhood",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#333333"
                    }]
                }, {
                    "featureType": "road.local",
                    "elementType": "labels.text",
                    "stylers": [{
                        "weight": 0.5
                    }, {
                        "color": "#333333"
                    }]
                }, {
                    "featureType": "transit.station",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "gamma": 1
                    }, {
                        "saturation": 50
                    }]
                }]
            };
            var mapElement = document.getElementById('maps');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(23.810332, 90.41251809999994),
                map: map,
                icon: 'images/marker.png'
            });
        }