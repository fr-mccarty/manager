<?php

namespace App\Livewire;

use Livewire\Component;

class GlobalUtilities extends Component
{

    public function copyLayoutComponents()
    {
        $fromPath = base_path() . '/resources/views/components/layouts/livewire/app.blade.php';
        $toPath = base_path() . '/stubs/components/layouts/livewire/app.blade.php';
        copy($fromPath, $toPath);

        $fromPath = base_path() . '/resources/views/components/layouts/livewire/guest.blade.php';
        $toPath = base_path() . '/stubs/components/layouts/livewire/guest.blade.php';
        copy($fromPath, $toPath);

        $fromPath = base_path() . '/resources/views/components/layouts/livewire/guest-plus.blade.php';
        $toPath = base_path() . '/stubs/components/layouts/livewire/guest-plus.blade.php';
        copy($fromPath, $toPath);

        $fromPath = base_path() . '/resources/views/components/layouts/livewire/print.blade.php';
        $toPath = base_path() . '/stubs/components/layouts/livewire/print.blade.php';
        copy($fromPath, $toPath);

        $this->notify('Done');
    }

    public function resetStubs()
    {
        //components/layouts
        //brand
        //components
        //welcome
        //Dashboard

    }
    public function render()
    {
        return view('livewire.global-utilities');
    }
}
