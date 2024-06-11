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
    public $content = '';
    public $isActive = '';
    public $url = '';
    public $projectPath = '';
    public $publicUrl = '';

    //Include by default
    public $entity = null;
    public $showingDeleteModal = false;

    protected $rules = [
        'name' => 'string|required|max:255',
        'description' => 'string|nullable|max:255',
        'content' => 'string|nullable|max:2000',
        'isActive' => 'boolean|nullable',
        'url' => 'string|required|max:255',
        'projectPath' => 'string|required|max:255',
        'publicUrl' => 'string|required|max:255',
    ];

    public function mount($appId = null)
    {
        if ($appId) {
            $this->entity = $this->model::findOrFail($appId);

            $this->name = $this->entity->name;
            $this->description = $this->entity->description;
            $this->content = $this->entity->content;
            $this->isActive = $this->entity->is_active;
            $this->url = $this->entity->url;
            $this->projectPath = $this->entity->project_path;
            $this->publicUrl = $this->entity->public_url;

        } else {
            $this->entity = $this->model::make();
        }
    }

    public function saveEntity()
    {
        $this->validate();

        $this->entity->name = $this->name;
        $this->entity->description = $this->description;
        $this->entity->content = $this->content;
        $this->entity->is_active = $this->isActive;
        $this->entity->url = $this->url;
        $this->entity->project_path = $this->projectPath;
        $this->entity->public_url = $this->publicUrl;

        if (empty($this->entity->id)) {
            $this->entity->team_id = Auth::user()->currentTeam->id;
            $this->entity->save();

            $this->redirect('/' . $this->entity->moduleUrl . '/' . $this->entity->id);
        }
        $this->entity->save();
        $this->notify('Saved');
    }

    public function copyWelcomePage()
    {
        $appsHomeDirectory = config('constants.apps_directory');
        $fromPath = base_path() . '/stubs/welcome.blade.php';
        $toPath = $appsHomeDirectory .  $this->projectPath . '/resources/views/welcome.blade.php';
        copy($fromPath, $toPath);
        $this->notify('Done');
    }

    public function copyPriestCollarComponent()
    {
        $appsHomeDirectory = config('constants.apps_directory');
        $fromPath = base_path() . '/stubs/priest-collar-logo.blade.php';
        $toPath = $appsHomeDirectory .  $this->projectPath . '/resources/views/components/priest-collar-logo.blade.php';
        copy($fromPath, $toPath);
        $this->notify('Done');
    }

    public function copyBrandLogos()
    {
        $appsHomeDirectory = config('constants.apps_directory');

        $fromPath = base_path() . '/stubs/authentication-card-logo.blade.php';
        $toPath = $appsHomeDirectory .  $this->projectPath . '/resources/views/components/authentication-card-logo.blade.php';
        copy($fromPath, $toPath);

        $fromPath = base_path() . '/stubs/application-logo.blade.php';
        $toPath = $appsHomeDirectory .  $this->projectPath . '/resources/views/components/application-logo.blade.php';
        copy($fromPath, $toPath);

        $fromPath = base_path() . '/stubs/application-mark.blade.php';
        $toPath = $appsHomeDirectory .  $this->projectPath . '/resources/views/components/application-mark.blade.php';
        copy($fromPath, $toPath);

        $this->notify('Done');
    }

    public function copyDashboard()
    {
        $appsHomeDirectory = config('constants.apps_directory');

        $fromPath = base_path() . '/stubs/dashboard.blade.php';
        $toPath = $appsHomeDirectory .  $this->projectPath . '/resources/views/livewire/dashboard.blade.php';
        copy($fromPath, $toPath);

        $fromPath = base_path() . '/stubs/Dashboard.php';
        $toPath = $appsHomeDirectory .  $this->projectPath . '/app/Livewire/Dashboard.php';
        copy($fromPath, $toPath);

        $this->notify('Done.  Make sure to update the web.php file in the project');
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
