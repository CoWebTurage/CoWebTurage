@extends('layouts.app')
@section('content')
    <div class="py-12 grid grid-rows-2">
        <div class="font-medium text-left text-lg">
            <div>
                <h3 class="text-body">Musique</h3>

            </div>
            <ul>
                @foreach($user->genres as $genre)
                    <li class="text-green-800">{{ $genre->name }}</li>
                @endforeach
            </ul>
            @if($user->id == Auth::id())
                <a href="{{ route('genre.edit', $user->id) }}">edit</a>
            @endif
        </div>

        <div class="font-medium text-left text-lg">
            <div>
                <h3 class="text-body">Playlists</h3>
            </div>
            <ul>
                @foreach($user->playlists as $playlist)
                    <li class="text-green-800"><a href="{{ $playlist->url }}">{{ $playlist->url }}</a></li>
                @endforeach
            </ul>
            @if($user->id == Auth::id())
                <a href="{{ route('playlist.edit', $user->id) }}">edit</a>
            @endif
        </div>
    </div>
@endsection
