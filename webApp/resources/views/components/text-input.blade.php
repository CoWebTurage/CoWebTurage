@props(['disabled' => false, "placeholder" => ""])

<input placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-1 border-slate-200 bg-black/40 text-white placeholder:text-white/50 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
