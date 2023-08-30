@extends('layouts.app')

@section('content')
    <div class="text-xl-left"> {{ $currentUser->firstname . " " . $currentUser->lastname }}</div>
    <div class="text-xl-right"> {{$partner->firstname . " " .$partner->lastname }}</div>
    @foreach($messages as $message)
        @if($message->sender_id ==$currentUser->id)
            <div class="text-left">
                {{ $message->content }}
            </div>
        @else
            <div class="text-right">
                {{ $message->content }}
            </div>
        @endif
    @endforeach
    <div>
        <form method="post" action="{{ route('message.send') }}">
            @csrf
            {{ __('Type here to send a new message') }}
            <input class="form-input" name="body">
            <button class="form-button">{{ __('Send') }}</button>
            <input name="receiver_id" type="hidden" value="{{$partner->id}}">
            <input name="location" type="hidden" value="/messages/{{ $partner->id }}">
        </form>
    </div>
@endsection
