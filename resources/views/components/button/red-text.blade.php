<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' => 'text-red-600 hover:text-red-900 text-sm leading-5 font-bold focus:outline-none focus:text-red-800 focus:underline transition duration-150 ease-in-out' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
    ]) }}
>
    {{ $slot }}
</button>
