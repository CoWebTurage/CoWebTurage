@extends('layouts.app')

@section('content')
    <div>
        <h2>Trip Details</h2>
        <p><strong>Departure Location:</strong> {{ $selectedTrip->start_location }}</p>
        <p><strong>Departure Time:</strong> {{ $selectedTrip->start_time }}</p>
        <p><strong>Arrival Location:</strong> {{ $selectedTrip->end_location }}</p>
        <p><strong>Arrival Time:</strong> {{ $selectedTrip->end_time }}</p>
        <p><strong>Price:</strong> {{ $selectedTrip->price }} CHF</p>
    </div>

    <div>
        <h2>Driver Details</h2>
        <p><strong>Name:</strong> {{ $driver->firstname }}</p>
        <p><strong>Last Name:</strong> {{ $driver->lastname }}</p>
        <p><strong>Rating:</strong> {{ $rating }}</p>
        <p><strong>Music Preference:</strong>
            @foreach($genre as $g)
                {{$g->name." / "}}
            @endforeach
        </p>
    </div>
@endsection
