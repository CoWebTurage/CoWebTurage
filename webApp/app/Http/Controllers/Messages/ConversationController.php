<?php

namespace App\Http\Controllers\Messages;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function displayConversations(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $conversations = Message::where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->get();

        $users_id = $conversations->map(function ($conversation) {
            if ($conversation->sender_id === auth()->id()) {
                return $conversation->receiver_id;
            }
            return $conversation->sender_id;
        })->unique();

        $users = User::whereIn('id', $users_id)->get();

        return view('messages.chat', ['users' => $users]);
    }

    public function showMessage($user_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $currentUser = Auth::user();
        $messagesSent = Message::where('sender_id', $user_id)->where('receiver_id', $currentUser->id);
        $messagesReceived = Message::where('sender_id', $currentUser->id)->where('receiver_id', $user_id);
        $messages = $messagesSent->union($messagesReceived);

        return view(
            'messages.conversation',
            [
                'messages' => $messages->get(),
                'currentUser' => $currentUser,
                'partner' => User::where('id', $user_id)->first(),
            ]
        );
    }
}
