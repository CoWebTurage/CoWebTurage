<?php

namespace App\Http\Livewire;

use App\Models\PaymentLink;
use App\Models\User;
use App\Rules\URLDomainRule;
use Illuminate\Support\Collection;
use Livewire\Component;

/*
 * TODO: Factorize with EditPlaylist
 */
class EditPaymentLink extends Component
{
    public User $user;

    public Collection $urls;

    public string $new_url = '';


    public function mount(User $user) {
        $this->user = $user;
        $this->urls = collect($user->payment_links);
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
            'new_url' => ['url', new URLDomainRule(['www.paypal.com', 'paypal.com', 'paypal.me'])]
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

        $p = new PaymentLink();
        $p->url = $this->new_url;

        $this->urls->add($p);
        $this->new_url = '';
    }

    public function confirm() {

        $old = $this->user->payment_links;
        $new = $this->urls->map(function ($p) {
            return new PaymentLink($p);
        });

        $removed = $old->diff($new);

        $removed->each(function (PaymentLink $p) {
           $p->delete();
        });

        $this->user->payment_links()->saveMany($new);

        return redirect()->route('profile.show', $this->user->id);
    }

    public function cancel() {
        return redirect()->route('profile.show', $this->user->id);
    }
}
