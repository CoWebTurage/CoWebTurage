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

        @if(Auth::id() != $trip->user_id)
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
        @else
            <div class="trip-info">
                <h2>{{ __("Passengers requests") }}</h2>
                <div>
                    <h3>{{ __("Accepted") }}</h3>
                    <ul>
                    @forelse($trip->passengers->filter(function ($p) { return $p->status == 'accepted'; }) as $passenger)
                        <li>{{ $passenger->user->firstname }} {{ $passenger->user->lastname }} ({{ $passenger->place }})</li>
                    @empty
                        <li>{{ __('Nobody accepted') }}</li>
                    @endforelse
                    </ul>
                </div>
                <div>
                    <h3>{{ __("Pending") }}</h3>
                    <ul>
                        @forelse($trip->passengers->filter(function ($p) { return $p->status == 'pending'; }) as $passenger)
                            <li>
                                <span>{{ $passenger->user->firstname }} {{ $passenger->user->lastname }} ({{ $passenger->place }})</span>
                                <a class="primary-button p-2" href="{{ route('passengers.accept', $passenger->id) }}"><i class="fas fa-check"></i></a>
                                <a class="primary-button p-2 bg-red-600" href="{{ route('passengers.reject', $passenger->id) }}"><i class="fas fa-times"></i></a>
                            </li>
                        @empty
                            <li>{{ __('Nobody reserved') }}</li>
                        @endforelse

                    </ul>
                </div>
            </div>
        @endif
    </div>

    @if(Auth::id() != $trip->user_id)
    <div class="">
        <a class="back-button primary-button p-2" href="javascript:history.back()">{{ __("Back") }}</a>

        <a class="map-button primary-button p-2" href="{{ route('trips.map', $trip->id) }}">{{ __("See on map") }}</a>

        <a class="map-button primary-button p-2" href="{{ route('passengers.create', $trip->id) }}">{{ __("Reserve") }}</a>
    </div>
    @endif
@endsection
