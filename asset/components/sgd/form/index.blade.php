@props([
    'id' => '',
    'class' => '',
    'url' => '',
    'method' => 'post',
    'changeMethod' => false,
])
@php
    $method = strtolower($method);
    $isSpoofed = in_array($method, ['put', 'patch', 'delete']);
    $formMethod = $isSpoofed || $method === 'post' ? 'post' : 'get';
@endphp
<form action="{{ $url }}" method="{{ $formMethod }}" id="{{ $id }}" {{ $attributes->merge(["class" => ""]) }}>
    @if ($formMethod === 'post')
        @csrf
    @endif
    @if ($isSpoofed)
        @method($method)
    @endif
    {{ $slot }}
</form>
