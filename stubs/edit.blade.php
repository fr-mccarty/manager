<x-page>

    <x-back-to-index :entity="$entity" />

    <x-heading>
        {{$entity->moduleName}}{{$entity->name ? ': ' . $entity->name : ''}}
    </x-heading>

    <div class="space-x-2 flex justify-end py-4">
        <x-dropdown align="right" width="60">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                        Actions
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </button>
                </span>
            </x-slot>

            <x-slot name="content">
                <div class="w-60">
                    <x-dropdown-link href="/{{$entity->moduleUrl}}/create" class="flex items-center space-x-2">
                        <x-icon.plus class="text-cool-gray-400"/> <span>New {{$entity->moduleName}}</span>
                    </x-dropdown-link>
                    <x-dropdown-button type="button" wire:click="$toggle('showingDeleteModal')" class="flex items-center space-x-2">
                        <x-icon.trash class="text-cool-gray-400"/> <span>Delete</span>
                    </x-dropdown-button>
                </div>
            </x-slot>
        </x-dropdown>

    </div>

    <x-form-section submit="saveEntity">
        <x-slot name="title">
            {{$entity->moduleName}}
        </x-slot>

        <x-slot name="description">
            Information about the {{$entity->moduleName}}
        </x-slot>

        <x-slot name="form">

            <x-input-module property-name="name" label="Name" type="text" />

            <div class="col-span-6 md:col-span-4">
                <x-label>Description</x-label>
                <x-input.text wire:model="description" id="description"></x-input.text>
                @error('description')
                <x-input.error>{{ $message }}</x-input.error>
                @enderror
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-button.black wire:loading.attr="disabled" type="submit">Save</x-button.black>
            <x-link.white-button class="ml-3" href="/{{$entity->moduleUrl}}">Cancel</x-link.white-button>
        </x-slot>
    </x-form-section>

    @include('include.delete-entity-modal')

</x-page>