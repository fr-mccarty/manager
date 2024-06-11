<!-- Delete Modal -->
<form wire:submit.prevent="deleteEntity">
    <x-confirmation-modal wire:model.defer="showingDeleteModal">
        <x-slot name="title">Delete this Record?</x-slot>

        <x-slot name="content">
            <div class="py-8 text-cool-gray-700">Are you sure you want to delete this record? This action is irreversible.</div>
        </x-slot>

        <x-slot name="footer">
            <x-button.white wire:click="$set('showingDeleteModal', false)">Cancel</x-button.white>

            <x-button.red class="ml-2" type="submit">Delete</x-button.red>
        </x-slot>
    </x-confirmation-modal>
</form>
