@extends('layouts.app')
@section('content')
    <div class="py-12 grid sm:grid-cols-3 grid-cols-1 gap-y-4">
        <div>
            <!--<div class="w-20 aspect-square">PHOTO</div>-->
            <div class="font-medium text-center sm:text-left text-lg">
                <h3 class="text-body">{{ __("Vehicles") }}</h3>
                <ul class="space-y-1">
                    @foreach($user->cars->take(5) as $car)
                        <li class="text-seaweed-600">{{ $car->model }}</li>
                    @endforeach
                    <li><a href="{{ route('car.index', $user->id) }}" class="primary-button p-2">{{ __("Show all") }}</a></li>
                </ul>
            </div>
        </div>
        <div>
            <div class="font-medium text-center sm:text-left text-lg">
                <h3 class="text-body">{{ __("User information") }}</h3>
                <div>{{ __("Lastname") }}</div>
                <div class="text-seaweed-600">{{ $user->lastname }}</div>
                <div>{{ __("Firstname") }}</div>
                <div class="text-seaweed-600">{{ $user->firstname }}</div>
            </div>
            <div class="font-medium text-center sm:text-left text-lg">
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
        <div>
            <div class="font-medium text-center sm:text-left text-lg">
                <h3 class="text-body">{{ __("Contact") }}</h3>
                <div>{{ __("Email") }}</div>
                <div class="text-seaweed-600">{{ $user->email }}</div>
                <div>{{ __("Phone") }}</div>
                <div class="text-seaweed-600">{{ $user->phone }}</div>
            </div>
            <div class="font-medium text-center sm:text-left text-lg">
                <h3 class="text-body">{{ __("Music") }}</h3>
                <ul class="space-y-1">
                    @foreach($user->genres->take(5) as $genre)
                        <li class="text-seaweed-600">{{ $genre->name }}</li>
                    @endforeach
                    <li><a href="{{ route('music.show', $user->id) }}" class="primary-button p-2">{{ __("Show all") }}</a></li>
                </ul>
            </div>
            <div class="font-medium text-center sm:text-left text-lg">
                <h3 class="text-body">{{ __("Ratings") }}</h3>
                <div class="font-medium text-center sm:text-left text-lg"> {{ __('Stars rating : ') . $ratings . '★'}}</div>
                <a class="primary-button p-2" href="{{ route('review.view', $user->id) }}">{{ __('View reviews') }}</a>
            </div>
        </div>
        @if($user->id == Auth::id())
            <a href="{{ route("profile.edit") }}"
               class="primary-button inline-flex items-center p-2 absolute right-1 bottom-1">
                {{ __("Edit profile") }}
            </a>
        @endif
    </div>
@endsection
