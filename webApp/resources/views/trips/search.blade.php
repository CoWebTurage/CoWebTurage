@extends('layouts.app')

@section('content')
    <div style="max-height: 400px; overflow-y: auto;">
        <table class="table">
            <h2 style="color: #0d0a0a">31.08.2023</h2>
            <br>
            <tr>

                <td>{{ __("Departure Time") }}</td>
                <td>{{ __("Arrival Time") }}</td>
                <td>{{ __("Departure") }}</td>
                <td>{{ __("Destination") }}</td>
                <td>{{ __("Price") }}</td>
                <td></td>
            </tr>

            @foreach($trips as $trip)
                <tr>
                    <td>{{ $trip->start_time }}</td>
                    <td>{{ $trip->end_time }}</td>
                    <td>{{ $trip->start_location }}</td>
                    <td>{{ $trip->end_location }}</td>
                    <td>{{ $trip->price }} CHF</td>
                    <td><a class="button" href="{{ route('trips.show', $trip->id) }}">{{ __("Details") }}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
