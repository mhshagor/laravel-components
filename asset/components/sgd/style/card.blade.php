@props([
    'title' => '',
    'titleClass' => '',
    'topClass' => '',
    'class' => '',
])
<div class="border border-gray-200 dark:border-gray-800 {{ $topClass }}">
    <h3 class="text-lg font-semibold bg-black/20 py-1 px-2 {{ $titleClass }}">{{ Str::headline($title) }}</h3>
    <div class="p-2 {{ $class }}">
        {{ $slot }}
    </div>
</div>
