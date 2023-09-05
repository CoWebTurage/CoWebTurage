@extends('layouts.app')

@section('content')
    <div class="max-h-[75vh] overflow-y-auto space-y-2">
        <h2>{{ __("Trips") }}</h2>
        <table class="w-full bg-neutral-300/40 p-2 rounded-lg">
            <tr>
                <td class="p-2">{{ __("Departure Time") }}</td>
                <td class="p-2">{{ __("Arrival Time") }}</td>
                <td class="p-2">{{ __("Departure") }}</td>
                <td class="p-2">{{ __("Destination") }}</td>
                <td class="p-2">{{ __("Price") }}</td>
                <td class="p-2">{{ __("Status") }}</td>
                <td class="p-2"></td>
            </tr>

            @forelse($passengers as $p)
                <tr class="odd:bg-black/10 even:bg-black/5">
                    <td class="p-2">{{ $p->trip->start_time->format('Y-m-d H:i') }}</td>
                    <td class="p-2">{{ $p->trip->end_time->format('Y-m-d H:i') }}</td>
                    <td class="p-2">{{ $p->trip->start_location }}</td>
                    <td class="p-2">{{ $p->trip->end_location }}</td>
                    <td class="p-2">{{ $p->trip->price }} CHF</td>
                    <td class="p-2">{{ __($p->status) }}</td>
                    <td class="p-2"><a class="primary-button p-2"
                                       href="{{ route('trips.show', $p->trip->id) }}">{{ __("Details") }}</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __("You have no reservations") }}</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
