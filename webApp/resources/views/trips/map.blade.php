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



    <div class="mt-4">
        <a class="primary-button p-2 text-lg" href="javascript:history.back()">Retour à la course</a>
    </div>

    <script>
        const map = L.map('map').setView([46.80111, 8.22667], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        const stops = @js($stops);

        Promise.all(stops.map(s => geocodeAddress(s))).then(coordinates => {
            const departure = coordinates[0];
            const destination = coordinates[coordinates.length - 1];

            map.fitBounds(L.latLngBounds(coordinates));

            const routingControl = L.Routing.control({
                waypoints: coordinates.map(c => {
                    const wp = L.latLng(c.lat, c.lon);
                    wp.interactive = false;
                    return wp;
                }),
                routeWhileDragging: false,
                draggableWaypoints: false,
                addWaypoints: false
            });

            routingControl.addTo(map);

            L.marker([departure.lat, departure.lon]).addTo(map)
                .bindPopup('Departure Location: ' + stops[0])
                .openPopup();

            L.marker([destination.lat, destination.lon]).addTo(map)
                .bindPopup('Arrival Location: ' + stops[stops.length - 1])
                .openPopup();
        });

        async function geocodeAddress(address) {
            try {
                const data = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
                    .then(response => response.json());

                if (data.length > 0) {
                    return data[0];
                } else {
                    console.error('Address not found:', address);
                }
            } catch(error) {
                console.error('Geocoding error:', error);
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
@endsection
