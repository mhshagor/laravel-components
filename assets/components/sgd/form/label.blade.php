@props(['for' => '', 'text' => ''])
<label
    for="{{ $for }}"
    class="block text-sm/6 font-semibold text-gray-600 dark:text-gray-100"
>
    {{ Str::headline(__($text)) }}
</label>
