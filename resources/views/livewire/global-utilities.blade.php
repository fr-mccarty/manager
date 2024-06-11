<x-page>

    <x-action-section>
        <x-slot name="title">
            Actions
        </x-slot>

        <x-slot name="description">
            Do cool stuff with the app here
        </x-slot>

        <x-slot name="content">
            @if(env('APP_ENV') === 'local')
                <div class="space-y-3">
                    <div>
                        <x-link.black-button wire:click="copyLayoutComponents">Copy Layout Components</x-link.black-button>
                    </div>
{{--                    <div>--}}
{{--                        <x-link.black-button wire:click="copyPriestCollarComponent">Copy Priest Collar Component</x-link.black-button>--}}
{{--                    </div>--}}
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
