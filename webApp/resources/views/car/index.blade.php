@extends('layouts.app')
@section('content')
    <div class="space-y-3">
        <h2>{{ __("Vehicles") }}</h2>
        <div class="max-h-[75vh]">
            <table class="relative text-left w-full bg-neutral-300/40 p-2 rounded-lg">
                <tr>
                    @foreach(['plate', 'model', 'color', 'seats'] as $field)
                        <th class="sticky top-0 p-2">{{ __($field) }}</th>
                    @endforeach
                    <th></th>
                </tr>
                @foreach($cars as $car)
                    <tr class="odd:bg-black/10 even:bg-black/5">
                        <td class="p-2">{{ $car->plate }}</td>
                        <td class="p-2">{{ $car->model }}</td>
                        <td class="p-2">{{ $car->color }}</td>
                        <td class="p-2">{{ $car->seats }}</td>
                        <td class="p-2 flex justify-end space-x-1">
                            <a href="{{ route("car.edit", $car->id) }}" class="primary-button text-center p-2 aspect-square"><i class="fas fa-pen"></i></a>

                            <form method="post" action="{{ route("car.destroy", $car->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="primary-button bg-red-600 p-2 aspect-square"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($cars->count() == 0)
                    <tr>
                        <td colspan="5" class="text-center">{{ __("You currently have no car.") }}</td>
                    </tr>
                @else
                    <tr class="h-3"></tr>
                @endif
            </table>
        </div>
        <div>
            <a href="{{ route("car.create") }}" class="primary-button p-2">{{ __("Add") }}</a>
        </div>
    </div>
@endsection
