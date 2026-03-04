@props([
    'id' => '',
    'type' => 'text',
    'name' => '',
    'autocomplete' => true,
    'placeholder' => lang('type_here'),
    'value' => '',
])

<input
    id="{{ $id }}"
    type="{{ $type }}"
    name="{{ $name }}"
    autocomplete="{{ $autocomplete }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'base-input']) }}
    value="{{ old($name) ?? $value }}"
/>
@error($name)
    <span class="text-red-500">{{ $message }}</span>
@enderror
