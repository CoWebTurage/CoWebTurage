@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-1 border-slate-200 bg-black/40 text-white placeholder:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
