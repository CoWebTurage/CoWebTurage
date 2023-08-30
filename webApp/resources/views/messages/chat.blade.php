@extends('layouts.app')
@section('content')
    <div class="title-decorate-center">
        {{__('Current chat')}}
    </div>
    @foreach( $users as  $user)
        <div>
            {{ $user->firstname}}
        </div>
    @endforeach
    @include('messages.new-chat')
@endsection
