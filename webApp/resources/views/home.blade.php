@extends('layouts.app')

@section('content')
    <h2>{{ __("Search trips") }}</h2>
    <!-- Swiper-->
    <form class="flex flex-wrap justify-stretch w-full p-2" method="GET" action={{ route('trips.search') }} >
    @csrf

        <x-text-input class="flex-1" id="start_location" type="text" name="start_location" :placeholder='__("Departure (Optional)")'></x-text-input>

        <x-text-input class="flex-1" id="end_location" type="text" name="end_location" required :placeholder='__("Destination")'></x-text-input>

        <x-text-input class="flex-1" id="date" type="text" name="date" data-time-picker="datetime" required></x-text-input>

        <x-text-input class="flex-1" id="nb_passengers" type="number" name="nb_passengers" :placeholder='__("Passengers")'></x-text-input>

        <select class="flex-1" id="genre_id" name="genre_id">
            <option value="">{{ __("None") }}</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{__("$genre->name")}}</option>
            @endforeach
        </select>

        <button class="flex-1 primary-button p-2" type="submit">Rechercher</button>

    </form>
@endsection
