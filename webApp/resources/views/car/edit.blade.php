@extends('layouts.app')
@section('content')
    <div>
        <h2>{{ __('Edit a vehicle') }}</h2>
        <div>
            <form method="post" action="{{ route("car.update", $car->id) }}">
                @csrf
                @method('patch')
                <div>
                    <x-input-label for="plate" :value="__('plate')" />
                    <x-text-input id="plate" name="plate" type="text" class="mt-1 block w-full" :value="old('plate', $car->plate)" required />
                </div>
                <div>
                    <x-input-label for="model" :value="__('model')" />
                    <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" :value="old('model', $car->model)" required />
                </div>
                <div>
                    <x-input-label for="color" :value="__('color')" />
                    <x-text-input id="color" name="color" type="text" class="mt-1 block w-full" :value="old('color', $car->color)" required />
                </div>
                <div>
                    <x-input-label for="seats" :value="__('seats')" />
                    <x-text-input id="seats" name="seats" type="number" min="1" step="1" max="30" class="mt-1 block w-full" :value="old('seats', $car->seats)" required />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
