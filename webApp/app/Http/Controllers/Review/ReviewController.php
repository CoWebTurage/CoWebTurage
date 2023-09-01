<?php

namespace App\Http\Controllers\Review;

use App\Models\Review;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function view($user_id)
    {
        $reviews = Review::where('reviewed_id', $user_id)->get();
        return view('review.review-display', ['user' => User::find($user_id), 'reviews' => $reviews]);
    }

    public function viewNewReviewsPossible()
    {
        /** @var User $currentUser */
        $currentUser = Auth::user();
        $userAlreadyReview = Review::where('reviewer_id', $currentUser->id)->pluck('reviewed_id');
        $newUsers = User::all()
            ->except($userAlreadyReview->toArray())
            ->except($currentUser->id);
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
            'stars' => $request->get('stars'),
            'reviewer_id' => $currentUser->id,
            'reviewed_id' => $request->get('reviewed_id'),
        ]);
        $review->save();
        return Redirect::to('review/' . $request->get('reviewed_id'));
    }

    public function edit(Request $request, $review_id)
    {
        $review = Review::find($review_id);
        if($review->reviewer_id != Auth::user()->id) {
            abort(403);
        }
        $review->comment = $request->get('comment');
        $review->stars = $request->get('stars');
        $review->save();
        return Redirect::to('review/' . $review->reviewed_id);
    }
}
