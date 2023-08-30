<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Write code on Method
 *
 * @return User[]()
 */


if (! function_exists('getUsersNoChat')) {
    function getUsersNoChat(int $id): Collection
    {
        $senders = DB::table('messages')->select('sender_id as id')->where('receiver_id', $id);
        $receivers = DB::table('messages')->select('receiver_id as id')->where('sender_id', $id);
        $ids = $senders->union($receivers)->get('id');
        $ids->add($id);
        return User::all();
    }
}
