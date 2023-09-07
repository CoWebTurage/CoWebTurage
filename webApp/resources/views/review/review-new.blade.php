@extends('layouts.app')
@section('content')
    <h2>{{ __('Write a review about any user !') }}</h2>
    @foreach($newUsers as $newUser)
        <form class="mb-4" method='post' action="{{ route('review.store') }}">
            @csrf
            <input name="reviewed_id" value="{{ $newUser->id }}" type="hidden">
            <h4>{{ __('Write a review on ') . $newUser->firstname . " " . $newUser->lastname }}</h4>
            <div>
                <label for="comment">{{ __("Comment") }}</label>
                <x-text-input id="comment" name="comment"></x-text-input>
            </div>
            <div class="inline-block">
                <label for="stars">{{ __('Stars') }}</label>
                <select id="stars" name="stars">
                    @foreach([1,2,3,4,5] as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <button class="primary-button p-2" type="submit">Submit</button>
        </form>
    @endforeach
@endsection
