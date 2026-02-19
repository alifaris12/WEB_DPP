@props(['type' => 'text', 'name' => null, 'id' => null, 'value' => null, 'disabled' => false])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id ?? $name }}"
    value="{{ old($name, $value) }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'border-gray-300 rounded-md shadow-sm']) }}>