<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassengerChangeStatusRequest;
use App\Models\Passenger;
use App\Models\Trip;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function create(Trip $trip) {
        return view('trips.passenger', [
            "trip" => $trip
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Trip $trip)
    {
        $passenger = new Passenger();
        $passenger->place = $request->place;
        $passenger->status = 'pending';
        $passenger->user_id = $request->user()->id;
        $passenger->trip_id = $trip->id;

        $passenger->save();

        return redirect()->route('home');
    }

    public function accept(PassengerChangeStatusRequest $request, Passenger $passenger)
    {
        $passenger->status = 'accepted';
        $passenger->save();

        return redirect()->route('trips.show', $passenger->trip_id);
    }

    public function reject(PassengerChangeStatusRequest $request, Passenger $passenger)
    {
        $passenger->status = 'rejected';
        $passenger->save();

        return redirect()->route('trips.show', $passenger->trip_id);
    }
}
