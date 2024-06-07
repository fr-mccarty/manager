@props([
    'label',
    'for',
    'colSpan' => '',
    'error' => false,
    'helpText' => false,
    'inline' => false,
    'paddingless' => false,
    'borderless' => false,
    'shadowless' => false,
])

@if(! $inline)
{{--    Label Above (standard - JAM)--}}
    <div class="{{$colSpan ? 'col-span-'.$colSpan : ''}}">
        <label for="{{ $for }}" class="whitespace-nowrap block text-sm font-medium leading-5 text-gray-700">{{ $label }}</label>

        <div class="mt-1 relative rounded-md {{$shadowless ? '' : 'shadow-sm'}}">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@else

{{--    Inline implementation--}}
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start {{ $borderless ? '' : ' sm:border-t ' }} sm:border-gray-200 {{ $paddingless ? '' : ' sm:py-2 ' }}">
        <label for="{{ $for }}" class="whitespace-nowrap block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            {{ $label }}
        </label>

        <div class="mt-1 sm:mt-0 sm:col-span-2">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@endif
