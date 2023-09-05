@props(['user'])

<a href="{{ route('profile.display', $user->id) }}" {!! $attributes->merge(['class' => "text-seaweed-600 hover:text-black"]) !!}>{{ $user->firstname }} {{ $user->lastname }} {{ $slot }}</a>
