@extends('layouts.app')
@section('content')
    <div class="py-12 grid grid-cols-3">
        <div class="">
            <div>PHOTO</div>
            <div class="font-medium text-left text-lg">
                @if(count($user->cars) != 0)
                    <h3 class="text-body">Véhicules</h3>
                    <ul>
                        @foreach($user->cars as $car)
                            <li>{{ $car->model }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="">
            <div class="font-medium text-left text-lg">
                <h3 class="text-body">Mes Infos</h3>
                <div>Nom</div>
                <div class="text-seaweed-600">{{ $user->lastname }}</div>
                <div>Prénom</div>
                <div class="text-seaweed-600">{{ $user->firstname }}</div>
            </div>
        </div>
        <div class="">
            <div class="font-medium text-left text-lg">
                <h3 class="text-body">Contact</h3>
                <div>Email</div>
                <div class="text-seaweed-600">{{ $user->email }}</div>
                <div>Téléphone</div>
                <div class="text-seaweed-600">{{ $user->phone }}</div>
            </div>
            <div class="font-medium text-left text-lg">
                <h3 class="text-body">Musique</h3>
                <ul>
                    @foreach($user->genres->take(5) as $genre)
                        <li class="text-green-800">{{ $genre->name }}</li>
                    @endforeach
                    <li><a href="{{ route('music.show', $user->id) }}">Tout afficher</a></li>
                </ul>
            </div>
        </div>
        @if($user->id == Auth::id())
            <a href="{{ route("profile.edit") }}" class="inline-flex items-center px-4 py-2 bg-seaweed-700 border border-transparent rounded-md font-semibold text-xs text-white position-absolute right-1 bottom-1">Edit</a>
        @endif
    </div>
@endsection
