@extends('layouts.app')
@section('content')
    <h2> {{ __('Consulting review on user: ') . $user->firstname . ' ' . $user->lastname }} </h2>
    @foreach($reviews as $review)
        <div class="text-center">
            {{ __('Comment : ' . $review->comment) }}
        </div>
        <div class="text-center">
            {{ __('Rating : ') . $review->stars . '★'}}
        </div>
        @if($review->reviewer_id == Auth::user()->id)
            <form method="POST" action="{{ route('review.update', $review->id) }}">
                @csrf
                @method('put')
                <div>
                    <label>{{ __("Comment") }}</label>
                    <x-text-input id="comment" name="comment" value="{{ $review->comment }}"></x-text-input>
                </div>
                <div class="inline-block">
                    <label for="stars">{{ __('Stars') }}</label>
                    <select id="stars" name="stars">
                        @foreach([1,2,3,4,5] as $value)
                            <option @selected($value == $review->stars) value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="primary-button p-2">Submit</button>
            </form>
        @endif
    @endforeach
@endsection
