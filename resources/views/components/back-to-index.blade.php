@props([
    'entity'
])

<x-link.black-text href="/{{$entity->moduleUrl}}" class="flex items-center mb-3">
    <x-icon.left-arrow/>
    <span>Back to {{$entity->moduleNamePlural}}</span>
</x-link.black-text>
