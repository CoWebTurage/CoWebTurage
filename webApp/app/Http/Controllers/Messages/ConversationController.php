<?php

namespace App\Http\Controllers\Messages;

use App\Models\Message;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function displayConversations(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $conversations = DB::table('messages')
            ->where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->get();

        $users_id = $conversations->map(function ($conversation) {
            if ($conversation->sender_id === auth()->id()) {
                return $conversation->receiver_id;
            }
            return $conversation->sender_id;
        })->unique();

        $users = DB::table('users')->whereIn('id', $users_id)->get();

        return view('messages.chat', ['users' => $users]);
    }
    public function showMessage($user_id, $user2_id)
    {
        $messagesSent = Message::where('sender_id', $user_id)->where('receiver_id', $user2_id);
        $messagesReceived = Message::where('sender_id', $user2_id)->where('receiver_id', $user_id);
        $messages = $messagesSent->union($messagesReceived);
        return view('messages.conversation', ['messages' => $messages->get()]);
    }
}
