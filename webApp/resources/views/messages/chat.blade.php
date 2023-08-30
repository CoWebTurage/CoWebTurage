@extends('layouts.app')
@section('content')
    <div class="title-decorate-center">
        {{__('Current chat')}}
    </div>
    @foreach( $users as  $user)
        <div>
            Conversation with user : {{ $user->firstname . " " . $user->lastname }}
            <a href="{{ url('messages/'. Auth::user()->id . '/'.$user->id ) }}">{{ __('View conversation') }}</a>
        </div>
    @endforeach
    @include('messages.new-chat')
@endsection
