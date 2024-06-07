<?php

namespace App\Livewire;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppsIndex extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions;

    protected string $model = \App\Models\App::class;
    public $entity;
    public $showingDeleteModal = false;
    public $showFilters = true;
    public $filters = [
        'search' => '',
    ];

    protected $queryString = [
        'sorts',
    ];

    protected $listeners = ['refresh' => '$refresh'];

    public function mount() {
        $this->entity = $this->model::make();
    }

    public function updatedFilters() { $this->resetPage(); }

    public function deleteSelected()
    {
        $deleteCount = $this->selectedRowsQuery->count();
        $entities = $this->selectedRowsQuery->get();

        foreach($entities as $entity) {
            $entity->delete();
        }

        $this->selected = [];
        $this->showingDeleteModal = false;
        $this->notify('You\'ve deleted ' . $deleteCount . ' ' . $this->entity->modelNamePlural);
    }

    public function toggleShowFilters()
    {
        if($this->showFilters == true) {
            $this->resetFilters();
        }
        $this->showFilters = ! $this->showFilters;
        $this->emit('refresh');
    }

    public function resetFilters() {
        $this->reset('filters');
    }

    public function getRowsQueryProperty()
    {
        $query = $this->model::query()
            ->where('team_id', Auth::user()->currentTeam->id)
            ->when(
                $this->filters['search'], fn($query, $search) => $query
                    ->search($search)
            );

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        return view('livewire.apps-index', [
            'entities' => $this->rows,
        ]);
    }

}
