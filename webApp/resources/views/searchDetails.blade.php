@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <div class="trip-details">
        <div class="trip-info">
            <h2>Détails</h2>
            <div class="location">
                <p><strong>Departure Location:</strong></p>
                <p class="normal-text">{{ $selectedTrip->start_location }} - {{ date('H:i', strtotime($selectedTrip->start_time)) }}</p>
            </div>
            <div class="location">
                <p><strong>Arrival Location:</strong></p>
                <p class="normal-text">{{ $selectedTrip->end_location }} - {{ date('H:i', strtotime($selectedTrip->end_time)) }}</p>
            </div>
            <div class="price">
                <p><strong>Prix:</strong></p>
                <p class="normal-text">{{ $selectedTrip->price }} CHF</p>
            </div>
        </div>

        <div class="trip-info"> <!-- Added a new trip-info div for right side -->
            <h2>Détails du conducteur</h2>
            <div class="location">
                <p><strong>Nom:</strong></p>
                <p class="normal-text">{{ $driver->firstname }}</p>
            </div>
            <div class="location">
                <p><strong>Nom de famille:</strong></p>
                <p class="normal-text">{{ $driver->lastname }}</p>
            </div>
            <div class="location">
                <p><strong>Évaluation:</strong></p>
                <p class="normal-text">{{ $rating }}</p>
            </div>
            <div class="location">
                <p><strong>Préférence musicale:</strong></p>
                <p class="normal-text">
                    @foreach($genre as $g)
                        {{ $g->name." / " }}
                    @endforeach
                </p>
            </div>
        </div>
    </div>

    <div class="button-container">
        <a class="back-button button" href="javascript:history.back()">Retour</a>
        <a class="map-button button" href="{{ route('showMap', ['departure' => $selectedTrip->start_location, 'arrival' => $selectedTrip->end_location]) }}">Voir sur la carte</a>
    </div>
@endsection
