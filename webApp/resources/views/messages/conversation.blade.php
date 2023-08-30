@extends('layouts.app')

@section('content')
    @foreach($messages as $message)
        @if($message->sender_id == Auth::user()->id)
            <div align="left">
                {{ $message->content }}
            </div>
        @else
            <div align="right">
                {{ $message->content }}
            </div>
        @endif
    @endforeach
@endsection
