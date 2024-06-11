@props([
    'leadingAddOn' => null,
    'id' => null,
])

<div class="block text-sm font-medium text-gray-700">
    @if($leadingAddOn)
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif
    <input type="text" id="{{$id}}" {{ $attributes->merge(['class' => 'mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' . ($leadingAddOn ? ' rounded-none rounded-r-md' : ' rounded-md')]) }}/>
</div>
