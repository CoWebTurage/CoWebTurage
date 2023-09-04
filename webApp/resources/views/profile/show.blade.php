@extends('layouts.app')
@section('content')
    <div class="py-12 grid grid-cols-3">
        <div class="">
            <div class="w-20 aspect-square">PHOTO</div>
            <div class="font-medium text-left text-lg">
                <h3 class="text-body">{{ __("Vehicles") }}</h3>
                <ul class="space-y-1">
                    @foreach($user->cars->take(5) as $car)
                        <li class="text-seaweed-600">{{ $car->model }}</li>
                    @endforeach
                    <li><a href="{{ route('car.index', $user->id) }}" class="primary-button p-2">{{ __("Show all") }}</a></li>
                </ul>
            </div>
        </div>
        <div class="">
            <div class="font-medium text-left text-lg">
                <h3 class="text-body">{{ __("My infos") }}</h3>
                <div>{{ __("Lastname") }}</div>
                <div class="text-seaweed-600">{{ $user->lastname }}</div>
                <div>{{ __("Firstname") }}</div>
                <div class="text-seaweed-600">{{ $user->firstname }}</div>
            </div>
            <div class="font-medium text-left text-lg">
                <h3 class="text-body">{{ __("Payment links") }}</h3>
                <ul class="space-y-1">
                    @foreach($user->payment_links as $payment)
                        <li><a href="{{ $payment->url }}">{{ $payment->url }}</a></li>
                    @endforeach
                    @if($user->id == Auth::id())
                        <li><a href="{{ route('payment.edit', $user->id) }}" class="primary-button p-2">{{ __("Edit") }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="">
            <div class="font-medium text-left text-lg">
                <h3 class="text-body">{{ __("Contact") }}</h3>
                <div>{{ __("Email") }}</div>
                <div class="text-seaweed-600">{{ $user->email }}</div>
                <div>{{ __("Phone") }}</div>
                <div class="text-seaweed-600">{{ $user->phone }}</div>
            </div>
            <div class="font-medium text-left text-lg">
                <h3 class="text-body">{{ __("Music") }}</h3>
                <ul class="space-y-1">
                    @foreach($user->genres->take(5) as $genre)
                        <li class="text-seaweed-600">{{ $genre->name }}</li>
                    @endforeach
                    <li><a href="{{ route('music.show', $user->id) }}" class="primary-button p-2">{{ __("Show all") }}</a></li>
                </ul>
            </div>
        </div>
        @if($user->id == Auth::id())
            <a href="{{ route("profile.edit") }}"
               class="primary-button inline-flex items-center p-2 position-absolute right-1 bottom-1">
                {{ __("Edit profile") }}
            </a>
        @endif
    </div>
@endsection
