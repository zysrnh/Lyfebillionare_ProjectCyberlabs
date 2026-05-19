@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-200 focus:border-[#000B7E] focus:ring-[#000B7E]/20 focus:ring-1 bg-white text-slate-800 rounded-full px-5 py-3 text-sm transition duration-150']) }}>
