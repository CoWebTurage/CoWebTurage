@extends('layouts.app')

@section('content')
    <div class="max-h-[75vh] overflow-y-auto mb-4 space-y-2">
        <h2>
            @if($mode == 'index')
                {{ __('My trips') }}
            @else
                {{ __('Results') }}
            @endif
        </h2>
        <table class="w-full bg-neutral-300/40 p-2 rounded-lg">
            <tr>
                <td class="p-2">{{ __("Departure Time") }}</td>
                <td class="p-2">{{ __("Arrival Time") }}</td>
                <td class="p-2">{{ __("Departure") }}</td>
                <td class="p-2">{{ __("Destination") }}</td>
                <td class="p-2">{{ __("Price") }}</td>
                <td class="p-2"></td>
            </tr>

            @forelse($trips as $trip)
                <tr class="odd:bg-black/10 even:bg-black/5">
                    <td class="p-2">{{ $trip->start_time->format('Y-m-d H:i') }}</td>
                    <td class="p-2">{{ $trip->end_time->format('Y-m-d H:i') }}</td>
                    <td class="p-2">{{ $trip->start_location }}</td>
                    <td class="p-2">{{ $trip->end_location }}</td>
                    <td class="p-2">{{ $trip->price }} CHF</td>
                    <td class="p-2"><a class="primary-button p-2"
                                       href="{{ route('trips.show', $trip->id) }}">{{ __("Details") }}</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        @if($mode == 'index')
                            {{ __("You have no trips") }}
                        @else
                            {{ __("No result") }}
                        @endif
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
    @if($mode == 'index')
        <div>
            <a class="primary-button p-2 text-base" href="{{ route("trips.create") }}">{{ __("Create trip") }}</a>
            <a class="primary-button p-2 text-base" href="{{ route("trips.reserved") }}">{{ __("Reservations") }}</a>
        </div>
    @endif
@endsection
