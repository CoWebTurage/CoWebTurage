<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreUserUpdateRequest;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GenreUserController extends Controller
{
    public function edit(Request $request, User $user)
    {
        return view('profile.music.genre-edit', [
            'user' => $user,
            'genres' => Genre::all()
        ]);
    }

    public function update(GenreUserUpdateRequest $request, User $user)
    {
        if (! Gate::allows('update-user', $user)) {
            abort(403);
        }
        $user->genres()->sync($request->genres);
        return to_route('music.show', $user->id);
    }
}
