<?php

namespace App\Http\Controllers\Messages;

use App\Http\Requests\Message\MessageSendRequest;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function view(Request $request): View
    {
        return view('messages.message-display', [
            'user' => $request->user(),
        ]);
    }

    public function send(MessageSendRequest $request): RedirectResponse
    {
        $message = new Message([
            'content' => $request->get('body'),
            'time' => new \DateTime(),
            'sender_id' => $request->get('sender'),
            'receiver_id' => $request->get('receiver'),
        ]);
        $message->save();
        return Redirect::route('message');
    }

}
