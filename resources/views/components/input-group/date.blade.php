@props([
    'label',
])

<x-input.group label="{{$label}}" for="{{\Str::snake($label)}}">
    <x-input.date {{ $attributes }} id="{{\Str::snake($label)}}" placeholder="MM/DD/YYYY" />
</x-input.group>
