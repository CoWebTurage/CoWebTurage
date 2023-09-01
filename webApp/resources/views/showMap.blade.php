@extends('layouts.app')

@section('content')
    <style>
        #map {
            width: 100%;
            height: 400px;
        }

        #back-button {
            margin-top: 20px;
        }
    </style>

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

    <div id="map"></div>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);
        var routingControl;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var departureAddress = "{{ $departureLocation }}";
        var arrivalAddress = "{{ $arrivalLocation }}";

        geocodeAddress(departureAddress, function (departureCoords) {
            if (departureCoords) {
                geocodeAddress(arrivalAddress, function (arrivalCoords) {
                    if (arrivalCoords) {
                        // Set the map view to the departure location
                        map.setView([departureCoords.lat, departureCoords.lon], 13);

                        // Add routing and directions
                        routingControl = L.Routing.control({
                            waypoints: [
                                L.latLng(departureCoords.lat, departureCoords.lon),
                                L.latLng(arrivalCoords.lat, arrivalCoords.lon)
                            ],
                            routeWhileDragging: true
                        }).addTo(map);

                        L.marker([departureCoords.lat, departureCoords.lon]).addTo(map)
                            .bindPopup('Departure Location: {{ $departureLocation }}')
                            .openPopup();

                        L.marker([arrivalCoords.lat, arrivalCoords.lon]).addTo(map)
                            .bindPopup('Arrival Location: ' + arrivalAddress)
                            .openPopup();
                    }
                });
            }
        });

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
    </script>

    <div class="button-container">
        <table>
            <tr>
                <td>
                    <a class="back-button button" href="javascript:history.back()">Retour à la course</a>
                </td>

                <td>
                    <a class="back-button button" href="javascript:history.back()">Réserver la course</a>
                </td>

                <td>
                    <a class="back-button button" href="javascript:history.back()">Continuer</a>
                </td>
            </tr>
        </table>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
