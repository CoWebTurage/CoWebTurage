<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function searchTrip(Request $request): View
    {

        extract((array)$request);
        //var_dump($request->get('test'));
        //var_dump($request);

        $tripInfos = DB::table('trips')
            ->join('cars', 'cars.id', '=', 'trips.car_id')
            ->join('users', 'users.id', '=', 'trips.user_id')
            ->join('genre_user', 'genre_user.user_id', '=', 'users.id')
            ->join('genres', 'genre_user.user_id', '=', 'genres.id')
            ->where([
                ['start_location', '=', $request->get('start_location')],
                ['end_location', '=', $request->get('end_location')],
                ['genres.name', '=', $request->get('genre')],
                //['start_time','=',$request->get('date')],

            ])
            ->get(['start_location', 'end_location', 'start_time', 'end_time', 'price', 'cars.model', 'users.firstname']);
        //print_r($tripInfos);
        return view('testDisplay',['tripInfos'=>$tripInfos]);

        /*
                return view('test', [
                    'start_location' => $tripInfos
                ]);*/


        //return view('test',  compact('tripInfos'));

        //return Redirect::route('home');

    }
}

?>
