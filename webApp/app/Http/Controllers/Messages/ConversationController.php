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

        $users_id = $conversations->map(function ($conversation) {
            if ($conversation->sender_id === auth()->id()) {
                return $conversation->receiver_id;
            }
            return $conversation->sender_id;
        })->unique();

        $users = DB::table('users')->whereIn('id', $users_id)->get();

        return view('messages.chat', ['users' => $users]);
    }
}
