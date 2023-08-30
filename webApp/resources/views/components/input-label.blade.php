@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md text-black/40 text-left']) }}>
    {{ $value ?? $slot }}
</label>
