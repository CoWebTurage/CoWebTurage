<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\User;

class CarController extends Controller
{
    /**
     * Show all the cars for a user
     */
    public function index(User $user)
    {
        return view('car.index', [
            'cars' => $user->cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $car = new Car($request->except('user_id'));
        $car->user_id = $request->user()->id;
        $car->save();

        return redirect()->route('car.index', $car->user_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->fill($request->except('user_id'));
        $car->save();

        return redirect()->route('car.index', $car->user_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('car.index', $car->user_id);
    }
}
