@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <div class="trip-details">
        <div class="trip-info">
            <h2>Détails</h2>
            <div class="location">
                <p><strong>Departure Location:</strong></p>
                <p class="normal-text">{{ $trip->start_location }} - {{ date('H:i', strtotime($trip->start_time)) }}</p>
            </div>
            <div class="location">
                <p><strong>Arrival Location:</strong></p>
                <p class="normal-text">{{ $trip->end_location }} - {{ date('H:i', strtotime($trip->end_time)) }}</p>
            </div>
            <div class="price">
                <p><strong>Prix:</strong></p>
                <p class="normal-text">{{ $trip->price }} CHF</p>
            </div>
        </div>

        <div class="trip-info"> <!-- Added a new trip-info div for right side -->
            <h2>Détails du conducteur</h2>
            <div class="location">
                <p><strong>Nom:</strong></p>
                <p class="normal-text">{{ $trip->driver->firstname }}</p>
            </div>
            <div class="location">
                <p><strong>Nom de famille:</strong></p>
                <p class="normal-text">{{ $trip->driver->lastname }}</p>
            </div>
            <div class="location">
                <p><strong>Évaluation:</strong></p>
                <p class="normal-text">{{ $rating }}<img src="/images/starIcon.png"></p>
            </div>
            <div class="location">
                <p><strong>Préférence musicale:</strong></p>
                <p class="normal-text">
                    @foreach($trip->driver->genres as $g)
                        {{ $g->name." / " }}
                    @endforeach
                </p>
            </div>
        </div>
    </div>

    <div class="button-container">
        <table>
            <tr>
                <td>
                    <a class="back-button button" href="javascript:history.back()">Retour</a>
                </td>

                <td>
                    <a class="map-button button"
                       href="{{ route('trips.map', $trip->id) }}">Voir
                        sur la carte</a>
                </td>
            </tr>
        </table>
    </div>
@endsection
