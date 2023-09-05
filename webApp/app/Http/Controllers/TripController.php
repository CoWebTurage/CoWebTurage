<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\Car;
use App\Models\Passenger;
use App\Models\Review;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::where('user_id', '=', Auth::id())->get();

        return view('trips.index', [
            "trips" => $trips,
            "mode" => 'index',
        ]);
    }

    public function show(Trip $trip)
    {
        // Compute user rating based on reviews
        $rating = Review::all()->where('reviewed_id', '=', $trip->user_id)->avg('stars');

        if(Auth::id() == $trip->user_id) {
            $trip->load('passengers');
        } else {
            $trip->load('driver.genres');
        }

        return view('trips.show', [
            "trip" => $trip,
            "rating" => $rating
        ]);
    }

    /**
     * This function is used to get all vehicles names for the connected user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $user_id = Auth::id();
        $cars = Car::where('user_id', $user_id)->get();
        return view('trips.create', ['cars' => $cars]);
    }

    /**
     * This function is used to create a Trip
     * @param StoreTripRequest $request
     */
    public function store(StoreTripRequest $request)
    {
        $trip = new Trip($request->except('user_id'));
        $trip->user_id = Auth::id();
        $trip->save();

        return view('trips.add-success');
    }

    public function edit(Trip $trip)
    {

    }

    public function update(UpdateTripRequest $request, Trip $trip)
    {
        $trip->fill($request->except('user_id'));
        $trip->save();
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
    }

    public function search(Request $request)
    {
        // Get the start and end locations from the request
        $start_location = $request->start_location;
        $end_location = $request->end_location;
        $genre = $request->genre;
        $nb_passengers = $request->nb_passengers;

        // Perform a partial matching search using LIKE
        $trips = Trip::with(["car", "passengers", "driver" => function ($query) use ($genre) {
            if (isset($genre)) {
                $query->whereHas('genres', function ($subquery) use ($genre) {
                    $subquery->where('name', '=', $genre);
                });
            }
        }])
            ->withCount('passengers')
            ->where(function ($query) use ($start_location, $end_location) {
                // Perform partial matching on start and end locations
                $query->where('end_location', 'like', '%' . $end_location . '%');
                if (isset($start_location)) {
                    $query->where('start_location', 'like', '%' . $start_location . '%');
                }
            })
            ->get()
            ->filter(function ($trip) use ($nb_passengers) {
                return $trip->car->seats >= $trip->passengers_count && (!isset($nb_passengers) || $trip->car->seats <= $nb_passengers);
            });

        return view('trips.index', [
            'trips' => $trips,
            "mode" => 'search',
        ]);
    }

    public function map(Trip $trip)
    {
        $stops = $trip->detours->pluck('location')->toArray();
        $stops[] = $trip->end_location;
        array_unshift($stops, $trip->start_location);

        return view('trips.map', [
            "stops" => $stops,
            "trip" => $trip
        ]);
    }

    public function reserved()
    {
        $passengers = Passenger::with('trip')->where('user_id', '=', Auth::id())->get();

        return view('trips.reserved', [
            "passengers" => $passengers
        ]);
    }
}
