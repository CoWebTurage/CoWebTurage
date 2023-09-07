@extends('layouts.app')
@section('content')
    <form method="post" action="{{ route('genre.update', $user->id) }}" class="mt-6">
        @csrf
        @method('patch')
        <x-input-label for="genres" :value="__('Genres')" />
        <select class="w-full" id="genres" name="genres[]" multiple data-container-class="mt-1 block w-full border-1 border-slate-200 bg-black/40 text-white placeholder:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" @selected($user->genres->contains($genre))>{{ $genre->name }}</option>
            @endforeach
        </select>
        <!--<x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />-->
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </form>
@endsection
