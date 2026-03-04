@props(['id' => '', 'name' => '', 'value' => '', 'placeholder' => '', 'rowspan' => 4, 'class' => ''])
<textarea id="{{ $id }}"
    name="{{ $name }}"
    rows="{{ $rowspan }}"
    class="base-textarea"
    placeholder="{{ __($placeholder) }}">{{ old($name, $value ?? '') }}</textarea>
<span class="text-red-500">{{ $errors->first($name) }}</span>
