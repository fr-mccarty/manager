<?php

namespace App\Livewire;

use App\DirectoryHelper;
use Livewire\Component;

class GlobalUtilities extends Component
{

    public function copyLayoutComponentsToStubs()
    {
        $sourceDirectory = base_path() . '/resources/views/components/layouts';
        $destinationDirectory = base_path() . '/stubs/components/layouts';
        DirectoryHelper::recurseCopy($sourceDirectory, $destinationDirectory);

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
