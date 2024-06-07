<?php

namespace App\Livewire;

use App\Models\App;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Detail extends Component
{
    public $app;

    public function mount()
    {
        $segment =  request()->segment(1);
        $this->app = App::where('url', $segment)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.detail')->layout('components.layouts.guest-plus');
    }
}
