@props([
    'id' => '',
    'name' => '',
    'placeholder' => 'dd/mm/yyyy - dd/mm/yyyy',
    'value' => '',
    'label' => '',
    'labelClass' => '',
    'required' => false,
    'errorClass' => '',
])

@php
    $id = $id ?: $name;
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
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->merge(['class' => 'base-input dateRange']) }}
    />

    @error($name)
        <small class="text-red-500 text-xs {{ $errorClass }}">{{ $message }}</small>
    @enderror
</div>
