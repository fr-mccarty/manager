<x-page>

    <x-heading>
        {{$entity->moduleNamePlural}}
    </x-heading>

    <div class="py-4 space-y-4">
        <!-- Top Bar -->
        <div class="md:flex md:justify-between pb-3 px-3 md:px-0">
            <div class="md:w-2/4 md:flex md:space-x-4">
                <div class="col-span-6 sm:col-span-4">
                    <x-input id="search" type="text" class="mt-1 block w-full" placeholder="Search {{$entity->moduleNamePlural}}..." wire:model.live="filters.search" autofocus />
                </div>
            </div>

            <div class="mt-3 md:mt-0 md:space-x-2 md:flex md:items-center">
                <x-input.group borderless paddingless inline for="perPage" label="Per Page">
                    <x-input.select wire:model.live="perPage" id="perPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </x-input.select>
                </x-input.group>

                <div class="flex-row flex space-x-3 mt-3 md:mt-0">

                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    Bulk Actions
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-60">
                                <x-dropdown-button type="button" wire:click="$toggle('showingDeleteModal')" class="flex items-center space-x-2">
                                    <x-icon.trash class="text-cool-gray-400"/> <span>Delete Selected</span>
                                </x-dropdown-button>
                            </div>
                        </x-slot>
                    </x-dropdown>

                    <x-link.black-button href="/{{$entity->moduleUrl}}/create">New {{$entity->moduleName}}</x-link.black-button>
                </div>

            </div>
        </div>

        <!-- Table -->
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading class="pr-0 w-8">
                        <x-checkbox wire:model.live="selectPage" />
                    </x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('name')" :direction="$sorts['name'] ?? null" class="text-left whitespace-nowrap">Name</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('description')" :direction="$sorts['description'] ?? null" class="text-left whitespace-nowrap hidden sm:table-cell">Description</x-table.heading>
                    <x-table.heading />
                </x-slot>

                <x-slot name="body">
                    @forelse ($entities as $entity)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $loop->index }}">
                            <x-table.cell class="pr-0">
                                <x-checkbox wire:model.live="selected" value="{{ $entity->id }}" />
                            </x-table.cell>
                            <x-table.cell class="">
                                {{ $entity->name }}
                            </x-table.cell>
                            <x-table.cell class="hidden sm:table-cell">
                                <div class="line-clamp-1">
                                    {{ $entity->description }}
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <x-link.edit href="/{{$entity->moduleUrl}}/{{$entity->id}}">Show</x-link.edit>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.empty>No {{$entity->moduleNamePlural}} found...</x-table.empty>
                    @endforelse
                </x-slot>
            </x-table>

            <div>
                {{ $entities->links() }}
            </div>
        </div>
    </div>

    @include('include.delete-selected-modal')

</x-page>
