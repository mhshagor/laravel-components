@props([
    'id' => '',
    'type' => 'text',
    'name' => '',
    'autocomplete' => true,
    'placeholder' => lang('type_here'),
    'value' => '',
    'label' => '',
    'labelClass' => '',
    'required' => false,
    'errorClass' => '',
])
@php
    $id = $id ? $id : $name;
    $labelClass .= $required ? ' required' : '';
    $labelClass .= $errors->has($name) ? ' !text-red-500' : '';
@endphp
<div class="space-y-1">
    @if ($label)
        <label
            for="{{ $id }}"
            class="base-label {{ $labelClass }}"
        >
            {{ Str::headline($label) }}
        </label>
    @endif
    <input
        id="{{ $id }}"
        type="{{ $type }}"
        name="{{ $name }}"
        autocomplete="{{ $autocomplete }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'base-input']) }}
        value="{{ old($name ?? $value) }}"
    />
    @error($name)
        <small class="text-red-500 text-xs {{ $errorClass }}">{{ $message }}</small>
    @enderror
</div>
