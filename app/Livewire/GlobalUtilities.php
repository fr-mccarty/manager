<?php

namespace App\Livewire;

use Livewire\Component;

class GlobalUtilities extends Component
{

    public function copyLayoutComponentsToStubs()
    {
        $fromPath = base_path() . '/resources/views/components/layouts/app.blade.php';
        $toPath = base_path() . '/stubs/components/layouts/app.blade.php';
        copy($fromPath, $toPath);

        $fromPath = base_path() . '/resources/views/components/layouts/guest.blade.php';
        $toPath = base_path() . '/stubs/components/layouts/guest.blade.php';
        copy($fromPath, $toPath);

        $fromPath = base_path() . '/resources/views/components/layouts/guest-plus.blade.php';
        $toPath = base_path() . '/stubs/components/layouts/guest-plus.blade.php';
        copy($fromPath, $toPath);

        $fromPath = base_path() . '/resources/views/components/layouts/print.blade.php';
        $toPath = base_path() . '/stubs/components/layouts/print.blade.php';
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
