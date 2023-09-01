<?php

namespace App\Http\Livewire;

use App\Models\Playlist;
use App\Models\User;
use App\Rules\PlaylistURLRule;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Collection;
use Livewire\Component;

class EditPlaylist extends Component
{
    public User $user;

    public Collection $playlists;

    public string $new_url = '';


    public function mount(User $user) {
        $this->user = $user;
        $this->playlists = collect($user->playlists);
    }

    public function render()
    {
        return view('livewire.edit-playlist', [
            'playlists' => $this->playlists
        ])->extends('layouts.app')->section('content');
    }

    public function rules()
    {
        return [
            'new_url' => ['url', new PlaylistURLRule()]
        ];
    }

    public function up($i) {
        if($i == 0) {
            return;
        }

        $tmp = $this->playlists->get($i -1);
        $curr = $this->playlists->get($i);
        $this->playlists->put($i - 1, $curr);
        $this->playlists->put($i, $tmp);
    }

    public function down($i) {
        if($i == $this->playlists->count() - 1) {
            return;
        }

        $tmp = $this->playlists->get($i + 1);
        $curr = $this->playlists->get($i);
        $this->playlists->put($i + 1, $curr);
        $this->playlists->put($i, $tmp);
    }

    public function delete($i) {
        $this->playlists->splice($i, 1);
    }

    public function add() {
        $this->validateOnly('new_url');

        $p = new Playlist();
        $p->url = $this->new_url;

        $this->playlists->add($p);
        $this->new_url = '';
    }

    public function confirm() {

        $old = $this->user->playlists;
        $new = $this->playlists->map(function ($p) {
            return new Playlist($p);
        });

        $removed = $old->diff($new);

        $removed->each(function (Playlist $p) {
           $p->delete();
        });

        $this->user->playlists()->saveMany($new);

        return redirect()->route('music.show', $this->user->id);
    }

    public function cancel() {
        return redirect()->route('music.show', $this->user->id);
    }
}
