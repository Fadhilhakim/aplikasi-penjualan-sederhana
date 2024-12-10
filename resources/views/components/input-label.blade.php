@props(['value'])

<label {{ $attributes->merge(['class' => 'mt-5 block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
