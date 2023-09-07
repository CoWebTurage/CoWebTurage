@extends('layouts.app')

@section('content')
    <div class="font-bold text-xl flex justify-between">
        <div>{{ $currentUser->firstname . " " . $currentUser->lastname }}</div>
        <div><x-profile-link :user="$partner"></x-profile-link></div>
    </div>
    <hr/>
    <div class="flex flex-col p-2 gap-y-2 max-h-[50vh] overflow-y-auto">
        @foreach($messages as $message)
            @php($mine = $message->sender_id == $currentUser->id)
            <div @class(["self-start" => $mine, "self-end" => !$mine, "rounded bg-neutral-300/40 p-2 text-xl"])>
                {{ $message->content }}
            </div>
        @endforeach
    </div>
    <hr/>
    <div>
        <form class="space-y-2" method="post" action="{{ route('message.send') }}">
            @csrf
            <input name="receiver_id" type="hidden" value="{{ $partner->id }}">
            <input class="form-input" name="body" placeholder="{{ __('Type here to send a new message') }}">
            <button class="primary-button p-2 text-base">{{ __('Send') }}</button>
        </form>
    </div>
@endsection
