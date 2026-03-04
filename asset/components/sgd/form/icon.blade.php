@props([
    'role' => 'add',
    'icon' => '',
    'class' => '',
])

@php
    switch ($role) {
        case 'add':
            $icon = $icon ?: 'add';
            break;

        case 'save':
            $icon = $icon ?: 'save';
            break;

        case 'edit':
            $icon = $icon ?: 'edit_square';
            break;

        case 'update':
            $icon = $icon ?: 'update';
            break;

        case 'delete':
            $icon = $icon ?: 'delete';
            break;

        case 'list':
            $icon = $icon ?: 'list';
            break;

        case 'cancel':
            $icon = $icon ?: 'cancel';
            break;
        case 'close':
            $icon = $icon ?: 'close';
            break;
        case 'submit':
            $icon = $icon ?: 'send';
            break;
        case 'reset':
            $icon = $icon ?: 'refresh';
            break;
        case 'back':
            $icon = $icon ?: 'arrow_back';
            break;
        case 'down':
            $icon = $icon ?: 'keyboard_arrow_down';
            break;
        case 'next':
            $icon = $icon ?: 'arrow_forward';
            break;
        case 'previous':
            $icon = $icon ?: 'arrow_back';
            break;
        case 'refresh':
            $icon = $icon ?: 'refresh';
            break;
        case 'restore':
            $icon = $icon ?: 'restore';
            break;
        case 'trash':
            $icon = $icon ?: 'restore_from_trash';
            break;
        default:
            $icon = $icon ?: 'send';
            break;
    }
    $class = 'material-icons text-xs flex items-center justify-center ' . $class;
@endphp

<i {{ $attributes->merge(['class' => $class]) }}>{{ $icon }}</i>
