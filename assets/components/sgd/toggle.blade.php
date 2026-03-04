@props([
    'id' => 'toggle_' . uniqid(),
    'checked' => false,
    'label' => '',
    'url' => '',
])

<div class="toggle-component flex items-center space-x-2">
    <label
        for="{{ $id }}"
        class="cursor-pointer flex items-center relative"
    >
        <input
            type="checkbox"
            id="{{ $id }}"
            data-toggle-id="{{ $id }}"
            class="sr-only"
            {{ $checked ? 'checked' : '' }}
            data-url="{{ $url }}"
        >
        <div class="w-10 h-6 bg-gray-300 rounded-full shadow-inner transition-colors duration-300 relative">
            <div
                class="dot w-6 h-6 bg-white rounded-full shadow absolute left-0 top-0 transform transition-transform duration-300 pointer-events-none">
            </div>
        </div>
        @if ($label)
            <span class="ml-2 select-none">{{ Str::headline($label) }}</span>
        @endif
    </label>
</div>
