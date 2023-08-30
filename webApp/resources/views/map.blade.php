@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

    <div id="map" style="width: 100%; height: 800px;"></div>

    <div>
        <label for="departureAddress">Adresse de départ:</label>
        <input type="text" id="departureAddress"/>
    </div>
    <div>
        <label for="viaAddress">Via (optionel, séparer plusieurs adresses par ,):</label>
        <input type="text" id="viaAddress"/>
    </div>
    <div>
        <label for="arrivalAddress">Adresse d'arrivée:</label>
        <input type="text" id="arrivalAddress"/>
    </div>
    <div>
        <button id="calculateRouteButton">Calculate Route</button>
    </div>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);
        var routingControl;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        function calculateRoute() {
            var departureAddress = document.getElementById('departureAddress').value;
            var viaAddress = document.getElementById('viaAddress').value;
            var arrivalAddress = document.getElementById('arrivalAddress').value;

            var waypoints = [];
            if (viaAddress) {
                var viaAddresses = viaAddress.split(',');
                viaAddresses.forEach(function (address) {
                    address = address.trim();
                    if (address) {
                        geocodeAddress(address, function (viaCoords) {
                            if (viaCoords) {
                                waypoints.push(L.latLng(viaCoords.lat, viaCoords.lon));
                            }
                        });
                    }
                });
            }

            // Use Nominatim API to obtain coordinates for addresses
            geocodeAddress(departureAddress, function (departureCoords) {
                geocodeAddress(arrivalAddress, function (arrivalCoords) {
                    if (departureCoords && arrivalCoords) {
                        if (routingControl) {
                            map.removeControl(routingControl);
                        }
                        routingControl = L.Routing.control({
                            waypoints: [
                                L.latLng(departureCoords.lat, departureCoords.lon),
                                ...waypoints,
                                L.latLng(arrivalCoords.lat, arrivalCoords.lon)
                            ],
                            routeWhileDragging: true,
                            lineOptions: {
                                styles: [{color: 'blue', opacity: 1, weight: 4}]
                            }
                        }).addTo(map);
                    }
                });
            });
        }

        function geocodeAddress(address, callback) {
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        var coordinates = data[0];
                        callback(coordinates);
                    } else {
                        console.error('Address not found:', address);
                        callback(null);
                    }
                })
                .catch(error => {
                    console.error('Geocoding error:', error);
                    callback(null);
                });
        }

        document.getElementById('calculateRouteButton').addEventListener('click', calculateRoute);
    </script>

@endsection
