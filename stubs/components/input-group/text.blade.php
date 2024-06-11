@props([
    'label' => '',
])

<x-input.group label="{{$label}}" for="{{\Str::snake($label)}}">
    <x-input.text {{$attributes}} id="{{\Str::snake($label)}}"  />
</x-input.group>
