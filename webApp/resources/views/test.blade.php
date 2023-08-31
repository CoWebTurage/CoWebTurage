@extends('layouts.app')

@section('content')

    @foreach($tripInfos as $t)

        <p>
            {{$t}}
        </p>
    @endforeach

@endsection
