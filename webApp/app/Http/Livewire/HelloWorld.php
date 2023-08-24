<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public string $name = "TOTO";
    public function render()
    {
        return view('livewire.hello-world');
    }
    public function delete()
    {
        $this->name = '';
    }
}
