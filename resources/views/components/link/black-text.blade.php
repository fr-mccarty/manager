<a
    {{ $attributes->merge([
        'class' => 'text-gray-900 hover:text-gray-600 text-sm leading-5 font-bold focus:outline-none focus:text-gray-800 focus:underline transition duration-150 ease-in-out' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
    ]) }}
>
    {{ $slot }}
</a>
