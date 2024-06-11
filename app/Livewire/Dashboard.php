<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Component;

class Dashboard extends Component
{
    public $activeApps;

    public function mount()
    {
        $this->activeApps = App::where('is_active', 1)->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
