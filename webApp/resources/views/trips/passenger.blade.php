@extends('layouts.app')
@section('content')
    <div>
        <form method="POST" action="{{ route('passengers.store', $trip->id) }}">
            @csrf
            <x-text-input type="text" name="place" id="place" required :placeholder='__("Location")'></x-text-input>

            <button type="submit" class="primary-button p-2">{{ __("Confirm") }}</button>
        </form>
    </div>
@endsection
