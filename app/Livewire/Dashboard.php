<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Component;

class Dashboard extends Component
{
    public $apps;

    public function mount()
    {
        $this->apps = App::get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
