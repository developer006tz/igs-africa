{{-- <button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-green-500 border border-green-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
{{ $slot }}
</button> --}}

<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-green-500 border border-green-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 transform hover:scale-110']) }}>
{{ $slot }}
</button>

