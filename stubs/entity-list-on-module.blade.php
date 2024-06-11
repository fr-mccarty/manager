<div>
    @if(!empty($parentEntity->id))

    <x-section-border />

    <x-action-section submit="saveEntity">
        <x-slot name="title">
            {{$moduleNamePlural}}
        </x-slot>

        <x-slot name="description">
            These are the {{$moduleNamePlural}} that are attached to the {{$parentEntity->moduleName}}
        </x-slot>

        <x-slot name="content">

            <div class="flex">
                <x-button.black wire:click="createItem">Add {{$moduleName}}</x-button.black>
            </div>

            <div wire:sortable="updateItemsOrder" class="space-y-3 mt-3">
                @forelse($items as $item)
                    <div wire:sortable.item="{{ $item->id }}" wire:key="task-{{ $item->id }}" class="relative flex justify-between items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-3 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                        <div class="flex items-center">
                            <div wire:sortable.handle>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                </svg>
                            </div>

                            <div class="min-w-0 py-1">
                                <div>
                                    {{$item->name}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{$item->description}}
                                </div>
                            </div>
                        </div>

                        <div class="flex-shrink-0">
                            <x-button.edit class="mr-3" wire:click="showEditItemModal('{{$item->id}}')">Edit</x-button.edit>
                            <x-button.red-text wire:click="showDeleteModal('{{$item->id}}')">Delete</x-button.red-text>
                        </div>
                    </div>
                @empty
                    <div class="">No {{$moduleNamePlural}} currently found</div>
                @endforelse
            </div>

            <x-modal id="%kebabChildrenNamePlural%-modal" maxWidth="3xl" wire:model="showingSelectModal">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex">
                        <div class="mt-3 w-full text-center sm:mt-0 sm:text-start">
                            <div class="text-lg font-medium text-gray-900">
                                Search for a {{$moduleName}}
                            </div>

                            <div class="mt-4 text-sm text-gray-600">
                                <div class="space-y-4">
                                    <div class="w-full flex space-x-4">
                                        <div class="w-full rounded-md shadow-sm">
                                            <input wire:model.live.debounce.300ms="filters.search" placeholder="Search for a {{$moduleName}}..." class="flex-1 form-input border-cool-gray-300 block rounded-md shadow-sm px-4 py-2 w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        </div>
                                    </div>
                                    <x-button.link wire:click="$set('filters.search', '')">Reset Search...</x-button.link>
                                    <x-table>
                                        <x-slot name="head">
                                            <x-table.heading class="text-left">Name</x-table.heading>
                                        </x-slot>
                                        <x-slot name="body">
                                            @forelse ($entities as $entity)
                                                <x-table.row class="cursor-pointer" wire:loading.class.delay="opacity-50" wire:click="addEntity('{{$entity->id}}')" wire:key="row-{{ $entity->id }}">
                                                    <x-table.cell>
                                                        {{ $entity->name }}
                                                    </x-table.cell>
                                                </x-table.row>
                                            @empty
                                                <x-table.empty>No results found</x-table.empty>
                                            @endforelse
                                        </x-slot>
                                    </x-table>
                                    <div>
                                        {{ $entities->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-end">
                    <x-button.white class="ml-3" wire:click.prevent="$toggle('showingSelectModal')">Cancel</x-button.white>
                </div>
            </x-modal>

            <form wire:submit.prevent="saveItem">
                <x-dialog-modal wire:model.defer="showingEditModal">
                    <x-slot name="title">Edit this {{$moduleName}}</x-slot>

                    <x-slot name="content">
                        <x-input-module property-name="name" label="Question" type="text" required />
                        <x-input-module property-name="description" label="Description" type="textarea" />
                    </x-slot>

                    <x-slot name="footer">
                        <x-button.white wire:click="$set('showingEditModal', false)">Cancel</x-button.white>
                        <x-button.black class="ml-2" type="submit">Save</x-button.black>
                    </x-slot>
                </x-dialog-modal>
            </form>

            <form wire:submit.prevent="deleteItem">
                <x-confirmation-modal wire:model.defer="showingDeleteModal">
                    <x-slot name="title">Delete this {{$moduleName}}?</x-slot>

                    <x-slot name="content">
                        <div class="py-8 text-cool-gray-700">Are you sure you want to delete this {{$moduleName}}?  This action is irreversible.</div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button.white wire:click="$set('showingDeleteModal', false)">Cancel</x-button.white>
                        <x-button.red class="ml-2" type="submit">Delete</x-button.red>
                    </x-slot>
                </x-confirmation-modal>
            </form>

        </x-slot>

    </x-action-section>
    @endif
</div>
