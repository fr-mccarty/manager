<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppEdit extends Component
{
    protected string $model = \App\Models\App::class;

    //Entity properties
    public $name = '';
    public $description = '';

    //Include by default
    public $entity = null;
    public $showingDeleteModal = false;

    protected $rules = [
        'name' => 'string|required|max:255',
        'description' => 'string|nullable|max:2000',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $this->entity = $this->model::findOrFail($id);

            if($this->entity->team_id != Auth::user()->currentTeam->id) {
                abort(403);
            }

            $this->name = $this->entity->name;
            $this->description = $this->entity->description;

        } else {
            $this->entity = $this->model::make();
        }
    }

    public function saveEntity()
    {
        $this->validate();

        $this->entity->name = $this->name;
        $this->entity->description = $this->description;

        if (empty($this->entity->id)) {
            $this->entity->team_id = Auth::user()->currentTeam->id;
            $this->entity->save();

            $this->redirect('/' . $this->entity->moduleUrl . '/' . $this->entity->id);
        }
        $this->entity->save();
        $this->notify('Saved');
    }

    public function deleteEntity()
    {
        //Delete any pivot tables first
        $this->entity->delete();
        $this->redirect('/' . $this->entity->moduleUrl);
    }

    public function render()
    {
        return view('livewire.app-edit');
    }
}
