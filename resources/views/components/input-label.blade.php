@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white dark:text-white-1000']) }}>
    {{ $value ?? $slot }}
</label>
