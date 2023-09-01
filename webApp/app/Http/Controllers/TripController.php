<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreUserUpdateRequest;
use App\Models\Car;
use App\Models\Genre;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TripController extends Controller
{
    public function createTrip(Request $request)
    {

        //print_r($request->all());





        $currentUser = Auth::user();
        if (is_null($currentUser)) {
            abort(403);
        }

        $user_id = Auth::id();

        $test = Car::belongTo($user_id);
        print_r($test);

        $trip = new Trip([
            'start_location' => $request->get('start_location'),
            'end_location' => $request->get('end_location'),
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time'),
            'price' => $request->get('price'),
            'user_id' => Auth::id(),
            'car_id' => 1,
        ]);

        $trip->save();
        return Redirect::to('home');

    }

}
