<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class SearchController extends Controller
{
    public function searchTrip(Request $request)
    {
        // Get the start and end locations from the request
        $startLocation = $request->input('start_location');
        $endLocation = $request->input('end_location');

        // Perform a partial matching search using LIKE
        $tripInfos = Trip::with(["car", "passengers", "driver" => function ($query) use ($request) {
            $query->whereHas('genres', function ($subquery) use ($request) {
                $subquery->where('name', '=', $request->genre);
            });

        }])
            ->withCount('passengers')
            ->where(function ($query) use ($startLocation, $endLocation) {
                // Perform partial matching on start and end locations
                $query->where('end_location', 'like', '%' . $endLocation . '%');
                if (isset($startLocation))$query->where('start_location', 'like', '%' . $startLocation . '%');
                    //->orWhere('end_location', 'like', '%' . $endLocation . '%');
            })
            ->get()
            ->filter(function ($trip) use ($request) {
                return $trip->car->seats >= $trip->passengers_count;
            });

        return view('search', ['tripInfos' => $tripInfos]);
    }

    public function searchDetails(Request $request)
    {
        $id = $request->id;
        $selectedTrip = Trip::findOrFail($id);

        // Fetch the driver's information based on user_id
        $driver = User::findOrFail($selectedTrip->user_id);

        // Compute user rating based on reviews
        $rating = Review::all()->where('reviewed_id', '=', $selectedTrip->user_id)->avg('stars');


        //$genre = Genre::all()->where('user_id', '=', $selectedTrip->user_id)->get('name');

        // A refaire d'une meilleure façon si possible
        $genre = DB::table('genres')
            ->join('genre_user', 'genres.id', '=', 'genre_user.genre_id')
            ->where('genre_user.user_id', '=', $selectedTrip->user_id)
            ->get(['name']);

        return view('searchDetails', ['selectedTrip' => $selectedTrip, 'driver' => $driver, 'rating' => $rating, 'genre' => $genre]);
    }

    public function showMap(Request $request)
    {
        $departureLocation = $request->query('departure');
        $arrivalLocation = $request->query('arrival'); // Get the arrival location

        // You can also perform any necessary logic or validation here

        return view('showMap', [
            'departureLocation' => $departureLocation,
            'arrivalLocation' => $arrivalLocation, // Pass both departure and arrival locations
        ]);
    }
}

?>
