@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <div class="trip-details">
        <div class="trip-info">
            <h2>{{ __("Details") }}</h2>
            <div class="location">
                <h3>{{ __("Departure") }}</h3>
                <p class="normal-text">{{ $trip->start_location }} - {{ date('H:i', strtotime($trip->start_time)) }}</p>
            </div>
            <div class="location">
                <h3>{{ __("Destination") }}</h3>
                <p class="normal-text">{{ $trip->end_location }} - {{ date('H:i', strtotime($trip->end_time)) }}</p>
            </div>
            <div class="price">
                <h3>{{ __("Price") }}</h3>
                <p class="normal-text">{{ $trip->price }} CHF</p>
            </div>
        </div>

        @if(Auth::id() != $trip->user_id)
        <div class="trip-info"> <!-- Added a new trip-info div for right side -->
            <h2>{{ __("Driver details") }}</h2>
            <div class="location">
                <h3>{{ __("Identity") }}</h3>
                <p><x-profile-link :user="$trip->driver"></x-profile-link></p>
            </div>
            <div class="location">
                <h3>{{ __("Ratings") }}</h3>
                <p class="normal-text m-auto"><span>{{ $rating }}</span><img class="inline" src="/images/starIcon.png"></p>
            </div>
            <div class="location">
                <h3>{{ __("Music") }}</h3>
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
                        <li><x-profile-link :user="$passenger->user">({{ $passenger->place }})</x-profile-link></li>
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
                                <span><x-profile-link :user="$passenger->user">({{ $passenger->place }})</x-profile-link></span>
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
    <div class="mt-4">
        <a class="back-button primary-button p-2" href="javascript:history.back()">{{ __("Back") }}</a>

        <a class="map-button primary-button p-2" href="{{ route('trips.map', $trip->id) }}">{{ __("See on map") }}</a>

        <a class="map-button primary-button p-2" href="{{ route('passengers.create', $trip->id) }}">{{ __("Reserve") }}</a>
    </div>
    @endif
@endsection
