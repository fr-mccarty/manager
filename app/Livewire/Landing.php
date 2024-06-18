<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Component;

class Landing extends Component
{
    public $apps;

    public function mount()
    {
        $this->apps = config('constants.apps');
    }

    public function render()
    {
        return view('livewire.landing')->layout('components.layouts.guest-plus');
    }
}
