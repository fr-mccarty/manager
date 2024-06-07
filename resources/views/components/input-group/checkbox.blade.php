@props([
    'paddingless' => false,
    'label',
    'description' => null,
])
<div>
    <div class="flex{{ $paddingless ? '' : ' mt-6' }}">
        <label class="flex items-center">
            <input {{ $attributes }} type="checkbox" class="form-checkbox">
            <div class="ml-2">
                <span >{{$label}}</span>
            </div>
        </label>
    </div>
    @if(!empty($description))
    <div class="ml-6 text-xs text-gray-500">{{$description}}</div>
    @endif
</div>
