@extends('layouts.app')
@section('content')
<div class="text-xl"> {{__('Write a review about any user !')}}</div>
@foreach($newUsers as $newUser)
    <form method='post' action="{{ route('review.send') }}">
        @csrf
        <input name="reviewed_id" value="{{ $newUser->id }}" type="hidden">
        <div class="text"> {{ __('Write a review on ') . $newUser->firstname . " " . $newUser->lastname }}</div>
        <div>
            {{__("Comment:")}}
            <input name="comment">
        </div>
        {{ __('Stars') }}
        <select name='stars' type="radio">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        <button>Submit</button>
    </form>
@endforeach
@endsection
