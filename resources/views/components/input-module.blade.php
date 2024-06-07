@props([
    'propertyName',
    'label',
    'type' => 'text',
    'required' => false,
    'rows' => 5,
    'description' => '',
    ])

@switch($type)
    @case('text')
        <div class="col-span-6 sm:col-span-4">
            <x-label>{{$label}}@if($required)<x-required-symbol />@endif</x-label>
            @if($description)<x-input.description>{{$description}}</x-input.description>@endif
            <x-input.text wire:model="{{$propertyName}}" id="{{\Illuminate\Support\Str::snake($label)}}" />
            @error($propertyName)
            <x-input.error>{{ $message }}</x-input.error>
            @enderror
        </div>
        @break

    @case('date')
        <div class="col-span-6 sm:col-span-4">
            <x-label>{{$label}}@if($required)<x-required-symbol />@endif</x-label>
            @if($description)<x-input.description>{{$description}}</x-input.description>@endif
            <x-input.date wire:model="{{$propertyName}}" id="{{\Illuminate\Support\Str::snake($label)}}" />
            @error($propertyName)
            <x-input.error>{{ $message }}</x-input.error>
            @enderror
        </div>
        @break

    @case('textarea')
        <div class="col-span-6 sm:col-span-4">
            <x-label>{{$label}}@if($required)<x-required-symbol />@endif</x-label>
            @if($description)<x-input.description>{{$description}}</x-input.description>@endif
            <x-input.textarea rows="{{$rows}}" wire:model="{{$propertyName}}" id="{{\Illuminate\Support\Str::snake($label)}}" />
            @error($propertyName)
            <x-input.error>{{ $message }}</x-input.error>
            @enderror
        </div>
        @break

    @case('time')
        <div class="col-span-6 sm:col-span-4">
            <x-label>{{$label}}@if($required)<x-required-symbol />@endif</x-label>
            @if($description)<x-input.description>{{$description}}</x-input.description>@endif
            <x-input.time rows="{{$rows}}" wire:model="{{$propertyName}}" id="{{\Illuminate\Support\Str::snake($label)}}" />
            @error($propertyName)
            <x-input.error>{{ $message }}</x-input.error>
            @enderror
        </div>
        @break

    @case('checkbox')
        <div class="col-span-6 sm:col-span-4">
            <x-input-group.checkbox wire:model="{{$propertyName}}" label="{{$label}}" description="{{$description}}" />
            @error($propertyName)
            <x-input.error>{{ $message }}</x-input.error>
            @enderror
        </div>
        @break

    @default
        Missing

@endswitch
