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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class SearchController extends Controller
{
    public function searchTrip(Request $request)
    {

        $tripInfos = Trip::with(["car", "passengers", "driver" => function ($query) use ($request) {
            $query->whereHas('genres', function ($subquery) use ($request) {
                $subquery->where('name', '=', $request->genre);
            });

        }])->withCount('passengers')->where([
            ['start_location', '=', $request->start_location],
            ['end_location', '=', $request->end_location],
        ])
            ->get()->filter(function ($trip) use ($request) {
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
        $rating = Review::all()->where('reviewed_id','=',$selectedTrip->user_id)->avg('stars');


        //$genre = Genre::all()->where('user_id', '=', $selectedTrip->user_id)->get('name');

        // A refaire d'une meilleure façon si possible
        $genre = DB::table('genres')
            ->join('genre_user', 'genres.id', '=', 'genre_user.genre_id')
            ->where('genre_user.user_id', '=', $selectedTrip->user_id)
            ->get(['name']);

        return view('searchDetails', ['selectedTrip' => $selectedTrip, 'driver' => $driver, 'rating' => $rating, 'genre' => $genre]);
    }
}

?>
