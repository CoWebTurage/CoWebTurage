<?php

namespace App\Http\Controllers\Review;

use App\Models\Passenger;
use App\Models\Review;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function view($user_id)
    {
        $reviews = Review::where('reviewed', $user_id)->all();
        return view('review.review-display', ['user' => User::find($user_id), 'reviews' => $reviews]);
    }

    public function viewNewReviewsPossible()
    {
        /** @var User $currentUser */
        $currentUser = Auth::user();
        $passenger = Trip::where('driver', $currentUser->id)->get('passenger');
        $trips = Passenger::where('user_id', $currentUser->id)->get('trip_id');
        $passenger->union(Trip::whereIn($trips)->get("passenger"));
        $newUsers = User::all()->except($passenger->get());
        return view('review.review-new', ['newUsers' => $newUsers]);
    }

    public function createReview(Request $request)
    {
        $currentUser = Auth::user();
        if (is_null($currentUser)) {
            abort(403);
        }
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:255',
            'stars' => 'required|int|max:255',
            'reviewed_id' => 'required|int|max:255',
        ]);
        if ($validator->fails()) {
            abort(400);
        }
        if (is_null(User::find($request->get('reviewed_id')))) {
            abort(400);
        }
        $review = new Review([
            'comment' => $request->get('comment'),
            'stars' => $request->get('star'),
            'reviewer_id' => $currentUser->id,
            'reviewed_id' => $request->get('reviewed_id'),
        ]);
    }
}
