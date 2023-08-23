<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LandingPage extends Component
{
    public string $name = "TOTO";
    public function render()
    {
        return view('livewire.landing-page');
    }
    public function delete()
    {
        $this->name = '';
    }
}
