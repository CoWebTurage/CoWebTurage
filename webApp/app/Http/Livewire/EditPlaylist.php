<?php

namespace App\Http\Livewire;

use App\Models\Playlist;
use App\Models\User;
use App\Rules\URLDomainRule;
use Illuminate\Support\Collection;
use Livewire\Component;

class EditPlaylist extends Component
{
    public User $user;

    public Collection $urls;

    public string $new_url = '';


    public function mount(User $user) {
        $this->user = $user;
        $this->urls = collect($user->playlists);
    }

    public function render()
    {
        return view('livewire.edit-urllist', [
            'urls' => $this->urls
        ])->extends('layouts.app')->section('content');
    }

    public function rules()
    {
        return [
            'new_url' => ['url', new URLDomainRule(['www.youtube.com', 'youtube.com', 'youtu.be', 'soundcloud.com', 'spotify.com', 'open.spotify.com'])]
        ];
    }

    public function up($i) {
        if($i == 0) {
            return;
        }

        $tmp = $this->urls->get($i -1);
        $curr = $this->urls->get($i);
        $this->urls->put($i - 1, $curr);
        $this->urls->put($i, $tmp);
    }

    public function down($i) {
        if($i == $this->urls->count() - 1) {
            return;
        }

        $tmp = $this->urls->get($i + 1);
        $curr = $this->urls->get($i);
        $this->urls->put($i + 1, $curr);
        $this->urls->put($i, $tmp);
    }

    public function delete($i) {
        $this->urls->splice($i, 1);
    }

    public function add() {
        $this->validateOnly('new_url');

        $p = new Playlist();
        $p->url = $this->new_url;

        $this->urls->add($p);
        $this->new_url = '';
    }

    public function confirm() {

        $old = $this->user->playlists;
        $new = $this->urls->map(function ($p) {
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
