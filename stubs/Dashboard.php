<?php

namespace App\Livewire;

use App\Models\Document;
use App\Models\Event;
use App\Models\Piece;
use Livewire\Component;

class Dashboard extends Component
{
    public $events;
    public $documents;
    public $pieces;

    public function mount()
    {
        $teamId = auth()->user()->currentTeam->id;
        $this->events = 1111;
        $this->documents = 2222;
        $this->pieces = 3333;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
