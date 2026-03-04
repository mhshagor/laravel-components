@props([
    'id' => '',
    'type' => 'button',
    'text' => '',
    'href' => '',
    'role' => 'add',
    'icon' => '',
    'iconPosition' => 'left',
    'class' => '',
    'iconClass' => '',
    'title' => true,
    'url' => '',
])

@php
    $baseClass = 'rounded-md p-2 text-center font-semibold text-white shadow-sm transition-colors duration-200
        focus-visible:outline-2 focus-visible:outline-offset-2 disabled:opacity-50 disabled:cursor-not-allowed
        m-1 flex items-center justify-center gap-1 text-xs';

    $themes = [
        'primary' => 'bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400
            focus-visible:outline-indigo-600 dark:focus-visible:outline-indigo-400 disabled:hover:bg-indigo-600',
        'warning' => 'bg-orange-600 dark:bg-orange-500 hover:bg-orange-500 dark:hover:bg-orange-400
            focus-visible:outline-orange-600 dark:focus-visible:outline-orange-400 disabled:hover:bg-orange-600',
        'danger' => 'bg-red-600 dark:bg-red-500 hover:bg-red-500 dark:hover:bg-red-400
            focus-visible:outline-red-600 dark:focus-visible:outline-red-400 disabled:hover:bg-red-600',
        'gray' => 'bg-gray-600 dark:bg-gray-500 hover:bg-gray-500 dark:hover:bg-gray-400
            focus-visible:outline-gray-600 dark:focus-visible:outline-gray-400 disabled:hover:bg-gray-600',
    ];

    switch ($role) {
        case 'add':
            $themeClass = $themes['primary'];
            $text = $text ?: 'Add New';
            break;

        case 'save':
            $themeClass = $themes['primary'];
            $text = $text ?: 'Save';
            break;

        case 'edit':
            $themeClass = $themes['warning'];
            $text = $text ?: 'Edit';
            break;

        case 'update':
            $themeClass = $themes['warning'];
            $text = $text ?: 'Update';
            break;

        case 'delete':
            $themeClass = $themes['danger'];
            $text = $text ?: 'Delete';
            break;

        case 'list':
            $themeClass = $themes['gray'];
            $text = $text ?: 'List';
            break;

        case 'cancel':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Cancel';
            break;
        case 'close':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Close';
            break;
        case 'submit':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Submit';
            break;
        case 'reset':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Reset';
            break;
        case 'back':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Back';
            break;
        case 'next':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Next';
            $iconPosition = 'right';
            break;
        case 'previous':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Previous';
            break;
        case 'refresh':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Refresh';
            break;
        case 'restore':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Restore';
            break;
        case 'trash':
            $themeClass = $themes['gray'];
            $text = $text ?: 'Trash';
            break;
        default:
            $themeClass = $themes['gray'];
            $text = $text ?: 'Submit';
            break;
    }

    $isDisabled = $attributes->get('disabled');

    // $importantAttrClass = collect(explode(' ', trim($class ?? '')))
    //     ->filter()
    //     ->map(fn($c) => str_starts_with($c, '!') ? $c : '!' . $c)
    //     ->implode(' ');
    $finalClass = $baseClass . ' ' . $themeClass . ' ' . $class . ($isDisabled ? ' pointer-events-none' : '');
@endphp

@if ($href)
    <a
        href="{{ $isDisabled ? 'javascript:void(0)' : $href }}"
        {{ $attributes->merge(['class' => $finalClass]) }}
    >
        @if ($iconPosition === 'left')
            <x-sgd.form.icon
                :icon="$icon ?? ''"
                :role="$role"
                :class="$iconClass ?? ''"
            />
        @endif
        {{ Str::headline($title ? __($text) : '') }}
        @if ($iconPosition === 'right')
            <x-sgd.form.icon
                :icon="$icon ?? ''"
                :role="$role"
                :class="$iconClass ?? ''"
            />
        @endif
    </a>
@else
    <button
        id="{{ $id }}"
        type="{{ $type }}"
        {{ $attributes->merge(['class' => $finalClass]) }}
        aria-label="{{ $text }}"
        {{ $url ? 'data-url="' . $url . '"' : '' }}
    >
        @if ($iconPosition === 'left')
            <x-sgd.form.icon
                :icon="$icon ?? ''"
                :role="$role"
                :class="$iconClass ?? ''"
            />
        @endif

        {{ Str::headline($title ? __($text) : '') }}

        @if ($iconPosition === 'right')
            <x-sgd.form.icon
                :icon="$icon ?? ''"
                :role="$role"
                :class="$iconClass ?? ''"
            />
        @endif
    </button>
@endif
