<x-page>

    <x-action-section>
        <x-slot name="title">
            Copy to Stubs
        </x-slot>

        <x-slot name="description">
            Copy parts of this app to the stub directory to be ready to copy it to other apps.
        </x-slot>

        <x-slot name="content">
            @if(env('APP_ENV') === 'local')
                <div class="space-y-3">
                    <div>
                        <x-link.black-button wire:click="copyLayoutComponentsToStubs">Copy Layout Components to Stubs</x-link.black-button>
                    </div>
                    <div>
                        <x-link.black-button wire:click="executeBash">Execute Bash</x-link.black-button>
                    </div>
{{--                    <div>--}}
{{--                        <x-link.black-button wire:click="copyBrandLogos">Copy Brand Logos</x-link.black-button>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <x-link.black-button wire:click="copyDashboard">Copy Dashboard</x-link.black-button>--}}
{{--                    </div>--}}
                </div>
            @else
                <div>The functions contained herein can only be run on the local device.</div>
            @endif
        </x-slot>
    </x-action-section>
</x-page>
