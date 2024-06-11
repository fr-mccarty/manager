@props([
    'label' => '',
    'colSpan' => null,
])

<x-input.group label="{{$label}}" for="{{\Str::snake($label)}}" colSpan="{{$colSpan}}">
    <x-input.select {{$attributes}} id="{{Str::snake($label)}}">
        {{$slot}}
    </x-input.select>
</x-input.group>
