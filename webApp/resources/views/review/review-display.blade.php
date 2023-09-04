@extends('layouts.app')
@section('content')
<div class="text-xl"> {{ __('Consulting review on user : ') . $user->firstname . ' ' . $user->lastname }} </div>
@foreach($reviews as $review)
    <div class="text-center">
        {{ __('Comment : ' . $review->comment) }}
    </div>
    <div class="text-center">
        {{ __('Rating : ') . $review->stars . '*'}}
    </div>
    @if($review->reviewer_id == Auth::user()->id)
        <form method="POST" action="{{ url('/review/' . $review->id) }}">
            @csrf
            @method('put')
            <div>
                {{__("Edit Comment:")}}
                <input name="comment" value="{{ $review->comment }}">
            </div>
            {{ __('Stars') }}
            <select name='stars'>
                @foreach([1,2,3,4,5,] as $value)
                    @if($value == $review->stars)
                        <option selected>{{ $value }}</option>
                    @else
                        <option>{{ $value }}</option>
                    @endif
                @endforeach
            </select>
            <button>Submit</button>
        </form>
    @endif
@endforeach
@endsection
