@props([
    'id' => '',
    'name' => '',
    'placeholder' => 'HH:mm AM/PM',
    'startValue' => '',
    'endValue' => '',
    'label' => '',
    'labelClass' => '',
    'required' => false,
    'errorClass' => '',
])

@php
    $id = $id ?: $name;
    $labelClass .= $required ? ' required' : '';
    $labelClass .= $errors->has($name) ? ' !text-red-500' : '';

    $pairId = 'timepair-' . $id;
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

    <div class="flex gap-0 group">
        <input
            type="text"
            name="{{ $name }}[start]"
            placeholder="Start {{ $placeholder }}"
            value="{{ old($name . '.start', $startValue) }}"
            {{ $attributes->merge(['class' => 'base-input timeRange !rounded-r-none', 'data-pair' => $pairId]) }}
        />
        <input
            type="text"
            name="{{ $name }}[end]"
            placeholder="End {{ $placeholder }}"
            value="{{ old($name . '.end', $endValue) }}"
            {{ $attributes->merge(['class' => 'base-input timeRange !rounded-l-none', 'data-pair' => $pairId]) }}
        />
    </div>

    @error($name)
        <small class="text-red-500 text-xs {{ $errorClass }}">{{ $message }}</small>
    @enderror
</div>
