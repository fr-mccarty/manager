<a
    {{ $attributes->merge([
        'class' => 'text-indigo-600 hover:text-indigo-900 text-sm leading-5 font-semibold focus:outline-none focus:text-indigo-800 focus:underline transition duration-150 ease-in-out' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
    ]) }}
>
    {{ $slot }}
</a>
