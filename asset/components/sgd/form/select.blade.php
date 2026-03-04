@props([
    'id' => '',
    'name' => '',
    'placeholder' => lang('select_one_option'),
    'options' => [],
    'value' => '',
])
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
    <span class="text-red-500">{{ $message }}</span>
@enderror
