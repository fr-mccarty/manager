@props([
    'selectAll' => false,
])
<div class="flex rounded-md">
    <input {{ $attributes }}
        {{$selectAll ? 'disabled' : ''}}
        type="checkbox"
        class="form-checkbox border-cool-gray-300 block transition duration-150 ease-in-out sm:text-sm sm:leading-5"
    />
</div>
