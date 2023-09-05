@extends('layouts.app')
@section('content')
    <h2>
        {{__('Current chats')}}
    </h2>
    @forelse($users as  $user)
        <div class="bg-neutral-300/40 p-2 rounded-lg">
            <span>Conversation with user : {{ $user->firstname . " " . $user->lastname }}</span>
            <a class="primary-button p-2" href="{{ url('chat/'.$user->id ) }}">{{ __('View') }}</a>
        </div>
    @empty
        <div>{{ __("You currently don't have any chats") }}</div>
    @endforelse

    @include('messages.new-chat', [ $usersToChat ])
@endsection
