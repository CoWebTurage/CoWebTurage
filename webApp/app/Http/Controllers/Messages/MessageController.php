<?php

namespace App\Http\Controllers\Messages;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function view(Request $request): View
    {
        return view('messages.message-display', [
            'user' => $request->user(),
        ]);
    }

    /**
     */
    public function send(Request $request): RedirectResponse
    {
        $currentUser = Auth::user();
        if (is_null($currentUser)) {
            abort(403);
        }
        $validator = Validator::make($request->all(),[
            'receiver_id' => 'required|int|max:255',
            'body' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            abort(400);
        }
        if (is_null(User::find($request->get('receiver_id')))) {
            abort(400);
        }
        $message = new Message([
            'content' => $request->get('body'),
            'time' => new \DateTime(),
            'sender_id' => $currentUser->id,
            'receiver_id' => $request->get('receiver_id'),
        ]);
        $message->save();
        return Redirect::to('chat/' . $request->get('receiver_id'));
    }
}
