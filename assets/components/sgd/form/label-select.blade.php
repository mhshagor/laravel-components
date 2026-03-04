@props([
    'id' => '',
    'name' => '',
    'placeholder' => lang('select_one_option'),
    'options' => [],
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
    <select
        id="{{ $id }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'base-select']) }}
    >
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $key => $val)
            <option
                value="{{ $key }}"
                @selected(old($name, $value ?? '') == $key)
            >{{ $val }}</option>
        @endforeach
    </select>
    @error($name)
        <small class="text-red-500 text-xs {{ $errorClass }}">{{ $message }}</small>
    @enderror
</div>
