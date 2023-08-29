<?php

namespace App\Http\Controllers\Messages;

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

        $users = $conversations->map(function ($conversation) {
            if ($conversation->user_id === auth()->id()) {
                return $conversation->receiver;
            }
            return $conversation->sender;
        })->unique();

        return view('messages.chat', compact('users'));
    }
}
