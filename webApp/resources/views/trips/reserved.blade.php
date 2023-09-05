@extends('layouts.app')

@section('content')
    <div class="max-h-[75vh] overflow-y-auto">
        <h2 style="color: #0d0a0a">{{ __("Trips") }}</h2>
        <table class="table">

            <tr>
                <td>{{ __("Departure Time") }}</td>
                <td>{{ __("Arrival Time") }}</td>
                <td>{{ __("Departure") }}</td>
                <td>{{ __("Destination") }}</td>
                <td>{{ __("Price") }}</td>
                <td>{{ __("Status") }}</td>
                <td></td>
            </tr>

            @forelse($passengers as $p)
                <tr>
                    <td>{{ $p->trip->start_time }}</td>
                    <td>{{ $p->trip->end_time }}</td>
                    <td>{{ $p->trip->start_location }}</td>
                    <td>{{ $p->trip->end_location }}</td>
                    <td>{{ $p->trip->price }} CHF</td>
                    <td>{{ __($p->status) }}</td>
                    <td><a class="button" href="{{ route('trips.show', $p->trip->id) }}">{{ __("Details") }}</a></td>
                </tr>
            @empty
                {{ __("You have no reservations") }}
            @endforelse
        </table>
    </div>
@endsection
