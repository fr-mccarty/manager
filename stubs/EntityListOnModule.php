<?php

namespace App\Livewire;

use App\Models\%childrenNameSingular%;
use Livewire\Component;

class %childrenNamePlural%On%onModule% extends Component
{
    public $moduleName = '%childrenNameSingular%';
    public $moduleNamePlural = '%childrenNamePlural%';

    public $parentEntity;
    public $items;

    public $name;
    public $description;

    public $showingEditModal = false;
    public $itemForEditingId = null;
    public $showingDeleteModal = false;
    public $itemForDeletingId = null;
    public $showingSelectModal = false;
    public $filters = [
        'search' => '',
    ];
    public $perPage = 10;

    protected $rules = [
        'name' => 'string|required',
        'description' => 'nullable|string',
    ];

    public function mount()
    {
        $this->setup();
    }

    public function setup()
    {
        $this->items = $this->parentEntity->items->sortBy('sort_order');
    }

    public function updateItemsOrder($items)
    {
        foreach($items as $item){
            $x = \App\Models\%childrenNameSingular%::find($item['value']);
            $x->sort_order = $item['order'];
            $x->save();
        }
        $this->setup();
        $this->notify('Order Saved');
    }

    public function createItem()
    {
        $this->showingEditModal = true;
        $this->itemForEditingId = null;
        $this->name = '';
        $this->description = '';
    }

    public function showEditItemModal($itemId)
    {
        $item = %childrenNameSingular%::find($itemId);
        $this->itemForEditingId = $itemId;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->showingEditModal = true;
    }

    public function saveItem()
    {
        $this->validate();

        if($this->itemForEditingId) {
            $item = %childrenNameSingular%::find($this->itemForEditingId);
            $item->name = $this->name;
            $item->description = $this->description;
            $item->save();
            $this->showingEditModal = false;
            $this->setup();

            $this->notify($this->moduleName . ' Updated');
        } else {
            %childrenNameSingular%::create([
                'questionnaire_id' => $this->parentEntity->id,
                'name' => $this->name,
                'description' => $this->description,
                'sort_order' => collect(%childrenNameSingular%::where('%kebabOnModuleNameSingular%_id', $this->parentEntity->id)->get())->max('sort_order') + 1,
            ]);
            $this->notify($this->moduleName . ' Saved');
        }

        $this->showingEditItemModal = false;
        $this->setup();
    }

    public function showDeleteModal($itemId)
    {
        $this->itemForDeletingId = $itemId;
        $this->showingDeleteModal = true;
    }

    public function deleteItem()
    {
        $this->showingDeleteModal = false;
        $item = %childrenNameSingular%::find($this->itemForDeletingId);
        $item->delete();
        $this->itemForEditingId = null;
        $this->notify($this->moduleName . ' Deleted');

        $this->setup();
    }

    public function showSelectModal()
    {
        $this->showingSelectModal = true;
    }

    public function addEntity($itemId)
    {
        $entity = new %childrenNameSingular%;
        $entity->%onModule%_id = $this->parentEntity->id;
        $entity->questionnaire_id = $itemId;
        $entity->save();

        $this->notify($this->moduleName. ' Added');
        $this->showingSelectModal = false;
        $this->reset('filters');
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function getRowsQueryProperty()
    {
        $query = %childrenNameSingular%::query()
            ->where('team_id', \Auth::user()->currentTeam->id)
            ->when($this->filters['search'], function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            });

        return $query;
    }

    public function applyPagination($query)
    {
        return $query->paginate($this->perPage);
    }

    public function render()
    {
        $entities = $this->parentEntity ? $this->rows : collect();

        return view('livewire.%kebabChildrenNamePlural%-on-%kebabOnModuleNameSingular%', [
            'entities' => $entities,
        ]);
    }
}
