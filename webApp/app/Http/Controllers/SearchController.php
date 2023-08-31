<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Trip;
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


        return view('test', ['tripInfos' => $tripInfos]);
        

    }
}

?>
