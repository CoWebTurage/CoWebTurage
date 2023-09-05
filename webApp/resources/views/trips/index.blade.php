@extends('layouts.app')

@section('content')
    <div class="max-h-[75vh] overflow-y-auto">
        <h2 style="color: #0d0a0a">
            @if($mode == 'index')
                {{ __('My trips') }}
            @else
                {{ __('Results') }}
            @endif
        </h2>
        <table class="table">
            <tr>

                <td>{{ __("Departure Time") }}</td>
                <td>{{ __("Arrival Time") }}</td>
                <td>{{ __("Departure") }}</td>
                <td>{{ __("Destination") }}</td>
                <td>{{ __("Price") }}</td>
                <td></td>
            </tr>

            @forelse($trips as $trip)
                <tr>
                    <td>{{ $trip->start_time }}</td>
                    <td>{{ $trip->end_time }}</td>
                    <td>{{ $trip->start_location }}</td>
                    <td>{{ $trip->end_location }}</td>
                    <td>{{ $trip->price }} CHF</td>
                    <td><a class="button" href="{{ route('trips.show', $trip->id) }}">{{ __("Details") }}</a></td>
                </tr>
            @empty
                @if($mode == 'index')
                    {{ __("You have no trips") }}
                @else
                    {{ __("No result") }}
                @endif
            @endforelse
        </table>
    </div>
    @if($mode == 'index')
        <a class="primary-button p-2" href="{{ route("trips.create") }}">{{ __("Create trip") }}</a>
        <a class="primary-button p-2" href="{{ route("trips.reserved") }}">{{ __("Reservations") }}</a>
    @endif
@endsection
