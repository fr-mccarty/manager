<a {{
    $attributes->merge(['class' => 'text-white text-xs bg-indigo-600 px-4 py-2 hover:bg-indigo-500 border border-transparent rounded-md active:bg-indigo-700 border-indigo-600'])
    }}>
    {{ $slot }}
</a>

{{--Sample--}}
{{--<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>--}}
{{--    {{ $slot }}--}}
{{--</button>--}}
