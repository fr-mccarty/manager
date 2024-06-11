<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 border-indigo-600 border border-transparent uppercase rounded-md font-semibold text-xs text-white tracking-widest disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
