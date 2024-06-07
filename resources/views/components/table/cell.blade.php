@props([
    'noYPadding' => false,
    'px' => 6
])

<td {{ $attributes->merge(['class' => 'px-' . $px . ' whitespace-no-wrap text-sm leading-5 text-cool-gray-900' . ($noYPadding ? ' py-0' : ' py-4') ]) }}>
    {{ $slot }}
</td>
