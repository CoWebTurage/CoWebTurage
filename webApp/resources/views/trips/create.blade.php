@extends('layouts.app')
@section('content')
    <form action="{{ route('trips.store') }}" method="POST">
        @csrf
        <div class="flex w-full">
            <x-text-input id="start_location" type="text" name="start_location"
                          required :placeholder='__("Departure")'></x-text-input>

            <x-text-input id="end_location" type="text" name="end_location" required
                          :placeholder='__("Destination")'></x-text-input>


            <select id="vehicle" name="car_id" required placeholder="{{__("Vehicle")}}">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->model }} ({{ $car->plate }})
                        ({{ $car->seats }} {{ __("seats") }})
                    </option>
                @endforeach
            </select>

            <!--
            <x-text-input id="date" type="text" name="date" data-time-picker="date"
                          required :placeholder='__("Date")'></x-text-input>
                          -->

            <x-text-input id="start_time" type="text" name="start_time"
                          data-time-picker="datetime" required :placeholder='__("Departure Time")'></x-text-input>

            <x-text-input id="end_time" type="text" name="end_time"
                          data-time-picker="datetime" required :placeholder='__("Arrival Time")'></x-text-input>

            <x-text-input id="price" type="number" name="price" required :placeholder='__("Price")'></x-text-input>
        </div>

        <button class="button button-lg button-gray-600" type="submit">{{ __("Create Trip") }}</button>
    </form>
@endsection
