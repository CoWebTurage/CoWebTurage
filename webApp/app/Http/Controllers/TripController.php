<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Genre;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TripController extends Controller
{

    public function getAllGenres()
    {
        $genres = Genre::all();
        return $genres;
    }

    public function home()
    {
        $genres = $this->getAllGenres();
        return view('home', ['genres' => $genres]);
    }

    /**
     * This function is used to get all vehicles names for the connected user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function listVehicles()
    {
        $user_id = Auth::id();
        $vehicles = Car::where('user_id', $user_id)->pluck('model')->toArray();
        return view('create_trip.form', ['vehicles' => $vehicles]);
    }


    /**
     * This function is used to create a Trip
     * @param Request $request
     * @return RedirectResponse
     */
    public function createTrip(Request $request)
    {
        $currentUser = Auth::user();
        if (is_null($currentUser)) {
            abort(403);
        }

        $user_id = Auth::id();
        $car = Car::where('model', '=', $request->get('vehicle'))->where('user_id', '=', $user_id)->pluck('id')->toArray();

        $trip = new Trip([
            'start_location' => $request->get('start_location'),
            'end_location' => $request->get('end_location'),
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time'),
            'price' => $request->get('price'),
            'user_id' => $user_id,
            'car_id' => $car[0],
        ]);

        $trip->save();
        return Redirect::to('successAddTrip');
    }
}
