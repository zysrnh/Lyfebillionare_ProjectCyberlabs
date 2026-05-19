<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#000B7E] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#000966] focus:bg-[#000966] active:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-[#000B7E] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
